<?php include('layout/header-layout.php'); ?>

<main class="micro-layout">
    
    <section class="card">
        
        <h1>SIGN IN</h1>
        
        <form action="signin.php" method="POST" class="form">
            
            <div class="required-input input-container">
                <label for="credential">Username or Email</label>
                
                <div class="input-error-container">
                    <input type="text" class="input-text" name="credential">
                    <div class="input-error"></div>
                </div>
            </div>
            
            <div class="password-input input-container">
                <label for="password">Password</label>
                
                <div class="input-error-container">
                    <input type="password" class="input-text" name="password">
                    <div class="input-error"></div>
                </div>
            </div>
            
            <div class="form-button">
                <input type="submit" class="input-button">
            </div>
            
        </form>
        
    </section>
    
</main>

<?php include('layout/footer-layout.php'); ?>