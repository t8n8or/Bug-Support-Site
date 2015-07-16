var tatesFormValidator = {
    myRequiredFields: document.getElementsByClassName('required'),

    checkRequiredFields: function(){
        var myRequiredFields = (this.myRequiredFields.length) ? this.myRequiredFields : 'error';
    	
        if(myRequiredFields != 'error'){
            //loop over all required fields
            for(var i = 0; i < myRequiredFields.length; i++){
                //check that if value property == ''
                if(!myRequiredFields[i].value){
                   myRequiredFields[i].style.borderColor = '#f00';
                }
            }
            
        };
    	//Continue on 
    },

    init: function(){
        for(var i = 0; i < this.myRequiredFields.length; i++){
            console.log('yolo')
            this.myRequiredFields[i].addEventListener('blur',function(){
                if(!this.value){
                    this.style.borderColor = '#f00';
                }else{
                        this.style.background = "url(http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-8/24/Accept-icon.png) no-repeat right center";
                    this.style.borderColor = '#0f0';
                }
                //tatesFormValidator.checkRequiredFields();
                });
        }
            
    }
};

tatesFormValidator.init();