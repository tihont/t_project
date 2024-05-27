<?php
/**
 * Php-шаблон контентной (средней) части страницы сайта с контактными данными и формой обратной связи
 */
?>
<main class="container d-flex flex-row mt-4 mb-4">

    <section class="p-5 col-6">

        <h2>Contacts</h2>
        <h2 class="lead">Address</h2>

        <p><?=$contact_data['address']?></p>
        <h2 class="lead">Contacts</h2>

        <p><a href="tel:<?=$contact_data['phone']?>" class=""><?=$contact_data['phone']?></a></p>

        <p><a href="mailto:<?=$contact_data['email']?>"><?=$contact_data['email']?></a></p>


    </section>

    <section class="p-5 border-start col-6">
        <h2>Your request</h2>

        <form action="send.php" class="col-12 needs-validation" method="post">

            <p>
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" class="form-control">
            </p>
            <p>
                <label for="mail" class="form-label">E-mail</label>
                <input type="email" id="mail" name="email" placeholder="Enter your e-mail" class="form-control"
                       required="">
            </p>
            <p>
                <label for="question" class="form-label">Request</label>
                <textarea id="question" name="request" placeholder="Enter your question" class="form-control"
                          required=""></textarea>
            </p>
            <p>
                <input type="checkbox" id="gdpr" name="gdpr" class="form-check-input me-2" required="">
                <label for="gdpr" class="form-label">Consent <a class="link-secondary" href="#PrivatePolicyPopUp"
                                                                data-bs-toggle="modal">for Personal Data Processing</a></label>
            </p>
            <p>
                <button type="submit" class="btn btn-primary mt-4">Send</button>
            </p>

            <input type="hidden" name="csrf_token" value="<?=$csrf_token?>">

        </form>

    </section>


    <div class="modal" id="PrivatePolicyPopUp">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">User's Consent</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>By continuing to use this website, you agree to the processing of your personal data in
                        accordance with our Privacy Policy and the General Data Protection Regulation (GDPR).</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                            id="acceptGdpr">Accept
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            id="cancelGdpr">No
                    </button>
                </div>
            </div>
        </div>
    </div>

</main>
