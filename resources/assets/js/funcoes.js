funcoes = {
   idade: function (data) {  
      hoje = new Date;  
      nascimento = new Date(data);

      var diferencaAnos = hoje.getFullYear() - nascimento.getFullYear();  
      if (new Date(hoje.getFullYear(), hoje.getMonth(), hoje.getDate()) <  
          new Date(hoje.getFullYear(), nascimento.getMonth(), nascimento.getDate()))  
        diferencaAnos--;  
      return(diferencaAnos);  
   },  
   diasEmAtendimento: function (data) {  
      hoje = new Date;  
      nascimento = new Date(data);

      date1 = new Date(data);
      date2 = new Date;
      var diferenca = Math.abs(date1 - date2); //diferença em milésimos e positivo
      var dia = 1000*60*60*24; // milésimos de segundo correspondente a um dia
      var total = Math.round(diferenca/dia); //valor total de dias arredondado 
      
      return(total);  
   },  




   dataValida: function(txtDate){
      var currVal = txtDate;
      if(currVal == '')
         return false;
      
      var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; //Declare Regex
      var dtArray = currVal.match(rxDatePattern); // is format OK?
      
      if (dtArray == null) 
         return false;
      
      //Checks for mm/dd/yyyy format.
      dtDay= dtArray[1];
      dtMonth = dtArray[3];
      dtYear = dtArray[5];        
      
      if (dtMonth < 1 || dtMonth > 12) 
         return false;
      else if (dtDay < 1 || dtDay> 31) 
         return false;
      else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31) 
         return false;
      else if (dtMonth == 2) 
      {
         var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
         if (dtDay> 29 || (dtDay ==29 && !isleap)) 
                  return false;
      }
      return true;


   },





   calculateAge: function (dobString) {
      var dob = new Date(dobString);
      var currentDate = new Date();
      var currentYear = currentDate.getFullYear();
      var birthdayThisYear = new Date(currentYear, dob.getMonth(), dob.getDate());
      var age = currentYear - dob.getFullYear();
      if(birthdayThisYear > currentDate) {
         age--;
      }
      return age;
   },

   notifica: function (tipo, texto1) {
      if (tipo == 'success') {
         swal({
            type: 'success',
            title: texto1,
            buttonsStyling: true,
            confirmButtonClass: 'btn btn-roxo'
         });
      } else if (tipo == 'info') {
         swal({
            type: 'info',
            title: texto1,
            buttonsStyling: true,
            confirmButtonClass: "btn btn-info"
         });
      } else if (tipo == 'aviso') {
         swal({
            type: 'warning',
            title: texto1,
            input: 'text',
            buttonsStyling: true,
            showCancelButton: true,
            cancelButtonClass: 'btn btn-roxo',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Alterar',
            confirmButtonClass: 'btn btn-danger'
         });
      }
   }, //Fim showSwal1

   notificationRight: function (from, align, cor, comentario) {
      // type = ['','info','success','warning','danger','rose','primary'];
      $.notify({
         // options
         icon: 'notifications',
         message: comentario,
      },{
         // settings
         element: 'body',
         position: null,
         type: cor,
         allow_dismiss: true,
         newest_on_top: false,
         showProgressbar: false,
         placement: {
            from: "top",
            align: "right"
         },
         offset: 20,
         spacing: 10,
         z_index: 2000,
         delay: 5000,
         timer: 1500,
         url_target: '_blank',
         mouse_over: null,
         animate: {
            enter: 'animated fadeInRight',
            exit: 'animated fadeOutRight'
         },
         onShow: null,
         onShown: null,
         onClose: null,
         onClosed: null,
         icon_type: 'class',
         template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
               '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
         '</div>' 
      });


   },






}
