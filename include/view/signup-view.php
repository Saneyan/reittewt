<?php include('layout/header-layout.php'); ?>

<main class="micro-layout">
    
    <section class="card">
        
        <h1>SIGN UP</h1>
        
        <form action="signup.php" method="POST" class="form">
                
            <div class="email-input input-container">
                <label for="email">Email Address</label>
                
                <div class="input-error-container">
                    <input type="text" class="input-text" name="email">
                    <div class="input-error"></div>
                </div>
            </div>
            
            <div class="username-input input-container">
                <label for="username">Username</label>
                
                <div class="input-error-container">
                    <input type="text" class="input-text" name="username">
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
            
            <div class="input-container" id="bio-input">
                <label for="bio">Bio</label>
                
                <div class="input-error-container">
                    <input type="text" class="input-text" name="bio">
                    <div class="input-error"></div>
                </div>
            </div>
            
            <div class="input-container" id="address-input">
                <label for="address">Address</label>
                
                <div class="input-error-container">
                    <input type="text" class="input-text" name="address">
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
