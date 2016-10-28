<?php include('layout/header-layout.php'); ?>

<main class="col2-layout">
    
    <?php include('layout/aside-layout.php'); ?>
    
    <article>
        <section class="card profile-card">
            
            <h1>Profile</h1>
            
            <form action="profile.php?update=profile" method="POST" class="form">
                
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
                    <input type="submit" class="input-button" value="update">
                </div>
                
            </form>
            
        </section>
        
        <section class="card profile-card">
            
            <h1>Password</h1>
            
            <form action="profile.php?update=password" method="POST" class="form">
                
                <div class="password-input input-container">
                    <label for="current_password">Current Password</label>
                    
                    <div class="input-error-container">
                        <input type="password" class="input-text" name="current_password">
                        <div class="input-error"></div>
                    </div>
                </div>
                
                <div class="password-input input-container">
                    <label for="new_password">Password</label>
                    
                    <div class="input-error-container">
                        <input type="password" class="input-text" name="new_password">
                        <div class="input-error"></div>
                    </div>
                </div>
                
                <div class="form-button">
                    <input type="submit" class="input-button" value="update">
                </div>
                
            </form>
            
        </section>
    </article>
    
</main>

<?php include('layout/footer-layout.php'); ?>
