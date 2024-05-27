<?php
/**
 * Php-шаблон средней (контентной) части страницы админ-панели.
 */
?>
<?php if (isset($is_admin) && $is_admin === true) : ?>
    <main class="container mt-4 mb-4">
        <section class="p-5">
            <h1 id="pagetitle">Admin area</h1>
            <p class="lead text-muted">This is an admin area of the site.</p>
        </section>
        <section class="p-5">
            <h2>Contact information</h2>
            <table id="contactsTable" class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <form action="control.php" method="post">
                        <td><input class="form-control" type="text" name="company_name" value=""></td>
                        <td><input class="form-control" type="text" name="address" value=""></td>
                        <td><input class="form-control" type="text" name="phone" value=""></td>
                        <td><input class="form-control" type="email" name="email" value=""></td>
                        <td>
                            <button class="btn" type="submit" name="insert_contact">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                            </button>
                        </td>
                    </form>
                </tr>
                <?php if (isset($contacts) && is_array($contacts) && count($contacts) > 0) : ?>
                    <?php foreach ($contacts as $contact) : ?>
                        <tr>
                            <form action="control.php" method="post">
                                <td><input class="form-control" type="text" name="company_name"
                                           value="<?= $contact['company_name'] ?>"></td>
                                <td><input class="form-control" type="text" name="address"
                                           value="<?= $contact['address'] ?>"></td>
                                <td><input class="form-control" type="text" name="phone"
                                           value="<?= $contact['phone'] ?>"></td>
                                <td><input class="form-control" type="email" name="email"
                                           value="<?= $contact['email'] ?>"></td>
                                <td>
                                    <button class="btn" type="submit" name="save_contact">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                            <path d="M11 2H9v3h2z"/>
                                            <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                                        </svg>
                                    </button>
                                    <button class="btn" type="submit" name="remove_contact">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                        </svg>
                                    </button>
                                </td>
                                <input type="hidden" name="contact_id" value="<?= $contact['id'] ?>">
                            </form>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </section>
        <section class="p-5">
            <h2>Gallery</h2>
            <table id="galleriesTable" class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Short description</th>
                    <th>Description</th>
                    <th>Current image</th>
                    <th>New image</th>
                    <th>Show in slider</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <form action="control.php" method="post" enctype="multipart/form-data">
                        <td><input class="form-control" type="text" name="title" value=""></td>
                        <td><input class="form-control" type="text" name="short_desc" value=""></td>
                        <td><input class="form-control" type="text" name="description" value=""></td>
                        <td>---</td>
                        <td><input class="form-control" type="file" name="image" value=""></td>
                        <td><input class="form-check-input" type="checkbox" name="is_slider" value="1"></td>
                        <td>
                            <button class="btn" type="submit" name="insert_gallery_item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                            </button>
                        </td>
                    </form>
                </tr>
                <?php if (isset($gallery_items) && is_array($gallery_items) && count($gallery_items) > 0) : ?>
                    <?php foreach ($gallery_items as $item) : ?>
                        <tr>
                            <form action="control.php" method="post" enctype="multipart/form-data">
                                <td><input class="form-control" type="text" name="title" value="<?= $item['title'] ?>">
                                </td>
                                <td><input class="form-control" type="text" name="short_desc"
                                           value="<?= $item['short_desc'] ?>"></td>
                                <td><input class="form-control" type="text" name="description"
                                           value="<?= $item['description'] ?>"></td>
                                <td>
                                    <?php if (!empty($item['image'])) : ?>
                                        <img src="<?='img/preview/' . $item['image'] ?>"
                                             class="img-thumbnail" alt="thumbnail" style="width: 100px; heigth: 75px; object-fit: cover;">
                                    <?php else : ?>
                                        ---
                                    <?php endif; ?>
                                    <input type="hidden" name="image" value="<?= $item['image'] ?>"
                                           readonly></td>
                                <td><input class="form-control" type="file" name="new_image" value=""></td>
                                <td><input class="form-check-input" type="checkbox" name="is_slider"
                                           value="1"<?= $item['is_slider'] == 1 ? ' checked' : '' ?>></td>
                                <td>
                                    <button class="btn" type="submit" name="save_gallery_item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                            <path d="M11 2H9v3h2z"/>
                                            <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                                        </svg>
                                    </button>
                                    <button class="btn" type="submit" name="remove_gallery_item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                        </svg>
                                    </button>
                                </td>
                                <input type="hidden" name="gallery_item_id" value="<?= $item['id'] ?>">
                            </form>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </section>
        <section class="p-5">
            <h2>Specification groups</h2>
            <table id="specificationsTable" class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <form action="control.php" method="post">
                        <td><input class="form-control" type="text" name="group_name" value=""></td>
                        <td><textarea class="form-control" name="description" rows="1"></textarea></td>
                        <td>
                            <button class="btn" type="submit" name="insert_spec_group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                            </button>
                        </td>
                    </form>
                </tr>
                <?php if (isset($spec_groups) && is_array($spec_groups) && count($spec_groups) > 0) : ?>
                    <?php foreach ($spec_groups as $group) : ?>
                        <tr>
                            <form action="control.php" method="post">
                                <td><input class="form-control" type="text" name="group_name"
                                           value="<?= $group['group_name'] ?>"></td>
                                <td>
                                    <textarea class="form-control" name="description" rows="1"><?= $group['description'] ?></textarea>
                                </td>
                                <td>
                                    <button class="btn" type="submit" name="save_spec_group">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                            <path d="M11 2H9v3h2z"/>
                                            <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                                        </svg>
                                    </button>
                                    <button class="btn" type="submit" name="remove_spec_group">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                        </svg>
                                    </button>
                                </td>
                                <input type="hidden" name="spec_group_id" value="<?= $group['id'] ?>">
                            </form>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </section>
        <section class="p-5">
            <h2>Guest's requests</h2>
            <table id="requestsTable" class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Request</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($requests) && is_array($requests) && count($requests) > 0) : ?>
                    <?php foreach ($requests as $request) : ?>
                        <tr>
                            <form action="control.php" method="post">
                                <td><?= $request['name'] ?></td>
                                <td><?= $request['email'] ?></td>
                                <td><?= $request['request'] ?></td>
                                <td>
                                    <button class="btn" type="submit" name="remove_request">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                        </svg>
                                    </button>
                                </td>
                                <input type="hidden" name="request_id" value="<?= $request['id'] ?>">
                            </form>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
<?php endif; ?>