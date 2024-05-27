<?php
/**
 *  Код, обрабатывающий запросы к админке сайта.
 */

$page = 'control'; // для подсветки пункта меню и подключения специфических статических ресурсов
require_once 'classes/config.php'; // подключение общей конфигурации проекта
// подключение моделей (классов) для тех таблиц в бд, которые может редактировать администратор через админ-панель
require_once 'classes/Contact.php';
require_once 'classes/Gallery.php';
require_once 'classes/Specification.php';
require_once 'classes/Request.php';

// проверка на авторизацию
if (!defined('__IS_ADMIN__') || !__IS_ADMIN__) {
    header('Location: admin/login.php');
    die();
}

// Функция для загрузки изображения на сервер, создания его превью и возврата имени файла для сохранения в бд. Работает
// только с изображениями формата jpg/jpeg и png. Требует подключения в php.ini модуля gd.
function uploadImage($new_image)
{
    $image_name = $new_image['name'];
    $image_tmp_name = $new_image['tmp_name'];
    $image_size = $new_image['size'];
    $image_error = $new_image['error'];
    $image_type = $new_image['type'];

    $image_ext = explode('.', $image_name);
    $image_actual_ext = strtolower(end($image_ext));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($image_actual_ext, $allowed)) {
        if ($image_error === 0) {
            if ($image_size < 1000000) {
                $image_name_new = uniqid('', true) . "." . $image_actual_ext;
                $image_destination = 'img/full/' . $image_name_new;
                move_uploaded_file($image_tmp_name, $image_destination);
                if (!file_exists($image_destination)) {
                    echo "There was an error uploading your file!";
                    return null;
                }
                $image_data = file_get_contents($image_destination);
                $thumbnail = imagecreatefromstring($image_data);

                $originalWidth = imagesx($thumbnail);
                $originalHeight = imagesy($thumbnail);

                // Определение стороны масштабирования и масштабирование изображения
                if ($originalWidth > $originalHeight) {
                    $newWidth = 533;
                    $newHeight = intval($originalHeight * $newWidth / $originalWidth);
                    $thumbnail = imagescale($thumbnail, $newWidth, $newHeight);
                } else {
                    $newHeight = 400;
                    $newWidth = intval($originalWidth * $newHeight / $originalHeight);
                    $thumbnail = imagescale($thumbnail, $newWidth, $newHeight);
                }

                // Обрезка изображения под формат 533x400
                $cropWidth = 533;
                $cropHeight = 400;
                $cropX = intval(($newWidth - $cropWidth) / 2);
                $cropY = intval(($newHeight - $cropHeight) / 2);
                $cropArray = ['x' => $cropX, 'y' => $cropY, 'width' => $cropWidth, 'height' => $cropHeight];
                $thumbnail = imagecrop($thumbnail, $cropArray);


                // $thumbnail = imagescale($thumbnail, 200, 200);
                $thumbnail_destination = 'img/preview/' . $image_name_new;
                if ($image_type === 'image/jpeg') {
                    imagejpeg($thumbnail, $thumbnail_destination);
                } else if ($image_type === 'image/png'){
                    imagepng($thumbnail, $thumbnail_destination);
                } else {
                    echo "Unsupported image type!";
                }
                return $image_name_new;
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
    return null;
}

// обработка запросов на добавление, изменение и удаление контактов, элементов гал��реи и групп характеристик
if (isset($_POST)) {

    // CUD-запросы для контактов (таблица contacts)
    if (isset($_POST['insert_contact'])) {
        $contact = new Contact();
        $contact->addContact($_POST['company_name'], $_POST['address'], $_POST['phone'], $_POST['email']);
        header('Location: control.php');
        die();
    }
    if (isset($_POST['save_contact'])) {
        $contact = new Contact();
        $contact->updateContact($_POST['contact_id'], $_POST['company_name'], $_POST['address'], $_POST['phone'], $_POST['email']);
        header('Location: control.php');
        die();
    }
    if (isset($_POST['remove_contact'])) {
        $contact = new Contact();
        $contact->deleteContact($_POST['contact_id']);
        header('Location: control.php');
        die();
    }

    // CUD-запросы для галереи (таблица gallery)
    if (isset($_POST['insert_gallery_item'])) {
        $gallery = new Gallery();
        if (isset($_FILES) && isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            $image_name = uploadImage($_FILES['image']);
            $gallery->addItem($_POST['title'], $_POST['short_desc'], $_POST['description'], $image_name, (isset($_POST['is_slider']) ? $_POST['is_slider'] : 0));
        } else {
            $gallery->addItem($_POST['title'], $_POST['short_desc'], $_POST['description'], '', (isset($_POST['is_slider']) ? $_POST['is_slider'] : 0));
        }
        header('Location: control.php');
        die();
    }
    if (isset($_POST['save_gallery_item'])) {
        $gallery = new Gallery();
        if (isset($_FILES) && !empty($_FILES['new_image']) && $_FILES['new_image']['size'] > 0) {
            $image_name = uploadImage($_FILES['new_image']);
            $gallery->updateItem($_POST['gallery_item_id'], $_POST['title'], $_POST['short_desc'], $_POST['description'], $image_name, (isset($_POST['is_slider']) ? $_POST['is_slider'] : 0));
        } else {
            $gallery->updateItem($_POST['gallery_item_id'], $_POST['title'], $_POST['short_desc'], $_POST['description'], $_POST['image'], (isset($_POST['is_slider']) ? $_POST['is_slider'] : 0));
        }
        header('Location: control.php');
        die();
    }
    if (isset($_POST['remove_gallery_item'])) {
        $gallery = new Gallery();
        $gallery->deleteItem($_POST['gallery_item_id']);
        header('Location: control.php');
        die();
    }

    // CUD-запросы для групп характеристик (таблица specifications)
    if (isset($_POST['insert_spec_group'])) {
        $spec_group = new Specification();
        $spec_group->addGroup($_POST['group_name'], $_POST['description']);
        header('Location: control.php');
        die();
    }
    if (isset($_POST['save_spec_group'])) {
        $spec_group = new Specification();
        $spec_group->updateGroup($_POST['spec_group_id'], $_POST['group_name'], $_POST['description']);
        header('Location: control.php');
        die();
    }
    if (isset($_POST['remove_spec_group'])) {
        $spec_group = new Specification();
        $spec_group->deleteGroup($_POST['spec_group_id']);
        header('Location: control.php');
        die();
    }

    // DELETE запрос к данным, хранящимся в бд в таблице requests
    if (isset($_POST['remove_request'])) {
        $request = new Request();
        $request->deleteRequest($_POST['request_id']);
        header('Location: control.php');
        die();
    }
}

// инициализация моделей и получение из бд списков для заполнения таблиц в админ-панели

$contact = new Contact();
$contacts = $contact->getContacts();

$gallery = new Gallery();
$gallery_items = $gallery->getAllItems();
$is_admin = true;

$specifications = new Specification();
$spec_groups = $specifications->getGroups();

$requests = new Request();
$requests = $requests->getRequests();

// подключение шаблона
require_once('front/template.php');