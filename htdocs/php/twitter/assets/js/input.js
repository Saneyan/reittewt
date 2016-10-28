$(function () {

    'use strict';
    
    var Validator = rettiwt.Validator;
    
    /**
     * .required-input
     */
    var requiredInput = $('.required-input .input-text');
    
    requiredInput.on('validate', function () {
        var required = $(this);
        var error = required.closest('.required-input').find('.input-error');
        
        if (required.val() !== '') {
            required.removeClass('input-invalid');
            error.hide();
        } else {
            required.addClass('input-invalid');
            error.html('Required').show();
        }
    });
    
    requiredInput.on('keyup', function () {
        $(this).trigger('validate');
    });
    
    /**
     * .email-input
     */
    var emailInput = $('.email-input .input-text');
    
    emailInput.on('validate', function () {
        var email = $(this);
        var error = email.closest('.email-input').find('.input-error');
        var result = Validator.validateEmail(email.val());
        
        if (result === true) {
            email.removeClass('input-invalid');
            error.hide();
        } else {
            email.addClass('input-invalid');
            error.html(result).show();
        }
    });
    
    emailInput.on('keyup', function () {
        $(this).trigger('validate');
    });
    
    /**
     * .username-input
     */
    var usernameInput = $('.username-input .input-text');
    
    usernameInput.on('validate', function () {
        var username = $(this);
        var error = username.closest('.username-input').find('.input-error');
        var result = Validator.validateUsername(username.val());
        
        if (result === true) {
            username.removeClass('input-invalid');
            error.hide();
        } else {
            username.addClass('input-invalid');
            error.html(result).show();
        }
    });
    
    usernameInput.on('keyup', function () {
        $(this).trigger('validate');
    });
    
    /**
     * .password-input
     */
    var passwordInput = $('.password-input .input-text');
    
    passwordInput.on('validate', function () {
        var password = $(this);
        var error = password.closest('.password-input').find('.input-error');
        var result = Validator.validatePassword(password.val());
        
        if (result === true) {
            password.removeClass('input-invalid');
            error.hide();
        } else {
            password.addClass('input-invalid');
            error.html(result).show();
        }
    });
    
    passwordInput.on('keyup', function () {
        $(this).trigger('validate');
    });
    
    /**
     * .tweet-input
     */
     var tweetInput = $('.tweet-input .input-text');
     
     tweetInput.on('validate', function () {
         var tweet = $(this);
         var error = tweet.closest('.tweet-input').find('.input-error');
         var result = Validator.validateTweet(tweet.val());
         
         if (result === true) {
             tweet.removeClass('input-invalid');
             error.hide();
         } else {
             tweet.addClass('input-invalid');
             error.html(result).show();
         }
     });
     
     tweetInput.on('keyup', function () {
         $(this).trigger('validate');
     });
    
    /**
     * .form
     */
    $('.form').submit(function (e) {
        var inputs = $(this.querySelectorAll('.input-text'));
        
        inputs.trigger('validate');
        
        if (this.querySelectorAll('.input-invalid').length > 0) {
            $(this).addClass('form-invalid');
            e.preventDefault();
        } else {
            $(this).removeClass('form-invalid');
        }
    });
    
    /**
     * .tweet-expandable-form
     */
     $('.tweet-expandable-form').submit(function (e) {
         var form = $(this);
         if (form.hasClass('form') && !form.hasClass('form-invalid')) {
             form.removeClass('tweet-expandable-form-expanded');
         }
     });
     
     $('.tweet-expandable-form textarea').focus(function () {
         var form = $(this).closest('.tweet-expandable-form');
         form.addClass('tweet-expandable-form-expanded');
     });
     
     $('.tweet-expandable-form .submit-button').click(function () {
         var form = $(this).closest('.tweet-expandable-form');
         if (!form.hasClass('form')) {
             form.removeClass('tweet-expandable-form-expanded');
         }
     });
});