;(function(window)
{
    expform = function(){

        var self = this;
        
        this.windowHeight = null;
        this.windowWidth  = null;
        this.footerHeight = null;
        this.headerHeight = null;
        this.count        = null;
        this.$mooveStep   = null;
        this.$step        = null;
        this.$email       = null;
        this.$start       = null;
        this.$arrival     = null;
        this.$desc        = null;
        this.$erros       = null;
        this.$submit      = null;
        this.errors       = [];
        this.select       = 0;

        this.init = function()
        {
            this.windowHeight    = $(window).height();
            this.windowWidth     = $(window).width();
            this.footerHeight    = $('footer').height();
            this.headerHeight    = $('header').height();
            this.count           = $('.step_control').children().length;
            this.$mooveStep      = $('.content_creat form ul');
            this.$step           = $('.step_ca');
            this.$email          = $('#gomobility_sitebundle_experiences_email');
            this.$start          = $('#gomobility_sitebundle_experiences_start');
            this.$arrival        = $('#gomobility_sitebundle_experiences_arrival');
            this.$desc           = $('#gomobility_sitebundle_experiences_description');
            this.$errors         = $('#errors');
            this.$submit         = $('#gomobility_sitebundle_experiences_envoyer');

            self.initHtml();

            self.$step.on('click', function(e)
            {
                e.preventDefault();
                self.mooveStep($(this));
            })

            self.$submit.on('click', function(e)
            {
                if(!self.validateForm()){
                    e.preventDefault();
                    self.showErrors();
                }
            })

        }

        this.initHtml = function()
        {
            $('.step_control li').eq(0).addClass('active');
            $('.content_creat form').css({width : self.windowWidth});
            $('.content_creat form ul').css({width:self.windowWidth * self.count});
            $('.content_creat form ul li').css({width:self.windowWidth});
        }

        this.mooveStep = function(stepClass)
        {
            self.$errors.empty();
            self.errors = [];
            
            if(stepClass.hasClass('step_suiv')){
                var isValid = self.validateForm();
                isValid ? self.moveForward() : self.showErrors();
            } else {
                self.moveBackward()
            }
        }

        this.moveForward = function()
        {
            self.select++;
            self.$mooveStep.animate({
                right : self.windowWidth * self.select
            });
            $('.step_control li').eq(self.select).addClass('active');
            $('.bg_step_control div').animate({
                width : 125 * self.select
            })
        }

        this.moveBackward = function()
        {
            self.select--;
            self.$mooveStep.animate({
                right : self.windowWidth * self.select
            });
            $('.step_control li').eq(self.select+1).removeClass('active');
            $('.step_control li').eq(self.select).addClass('active');
            $('.bg_step_control div').animate({
                width : 125 * self.select
            })
        }

        this.validateForm = function()
        {
            var isValid;
            
            if(self.select == 0){
                isValid = self.validateEmail();
            } else if (self.select == 1) {
                var gstart   = self.notEmpty(self.$start);
                var garrival = self.notEmpty(self.$arrival);

                isValid = garrival == true && gstart == true ? true : false; 
            } else if (self.select == 2) {
                isValid = self.notEmpty(self.$desc);
            }

            return isValid;
        }


        this.validateEmail = function()
        {
            var regEmail = new RegExp('^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$');
            var isValid = regEmail.test(self.$email.val());

            if(isValid != true) self.errors.push('Merci de rentrer un email valide');

            return isValid;
        }

        this.notEmpty = function($input)
        {
            var isValid = $input.val() ? true : false;

            if(isValid != true) self.errors.push('Merci de remplir tous les champs');

            return isValid;
        }

        this.showErrors = function()
        {
            for(var i=0; i<self.errors.length; i++){
                self.$errors.append('<p>'+self.errors[i]+'</p>');
            }
        }
    }

    window.expform = expform;

})(window);