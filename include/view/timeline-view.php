<?php include('layout/header-layout.php'); ?>

<main class="col2-layout">
    
    <?php include('layout/aside-layout.php'); ?>
    
    <article>
        <form action="#" class="form tweet-creation-form tweet-expandable-form">
            <div class="tweet-input input-textarea-error-container">
                <textarea class="input-text" maxlength="140" placeholder="Click to expand to tweet"></textarea>
                <div class="input-error"></div>
            </div>
            <input type="submit" class="submit-button input-button" value="Tweet">
        </form>
         
        <section class="card tweet-card">
            <div class="tweet-credit">
                <img src="https://avatars2.githubusercontent.com/u/1273247?v=3&s=466">
                <div>@Saneyan</div>
            </div>
            
            <div class="tweet-content">hello</div>
            
            <form action="#" class="form tweet-expandable-form">
                <div class="tweet-input input-textarea-error-container">
                    <textarea class="input-text" maxlength="140" placeholder="Click to expand to reply"></textarea>
                    <div class="input-error"></div>
                </div>
                <input type="submit" class="submit-button input-button" value="Reply">
            </form>
        </section>
    </article>
    
</main>

<?php include('layout/footer-layout.php'); ?>