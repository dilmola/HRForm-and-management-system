jQuery(function($) {
    //var $buildwrap = $(document.getElementById('build-wrap')),
   
   var $fbEditor = $(document.getElementById('fb-editor')),
   $formContainer = $(document.getElementById('fb-rendered-form')),
   fbOptions = {
     onSave: function() {
       $fbEditor.toggle();
       $formContainer.toggle();
       $('form', $formContainer).formRender({
         formData: formBuilder.formData
       });
     }
   },
   formBuilder = $fbEditor.formBuilder(fbOptions);
  
   $('.edit-form', $formContainer).click(function() {
     $fbEditor.toggle();
     $formContainer.toggle();
   });
  
   
   const templateSelect = document.getElementById("formTemplates");
   const templates = {
     user: [
       {
         type: "text",
         label: "Name:",
         subtype: "text",
         className: "form-control",
         name: "text-1475765723950"
       },
       {
         type: "text",
         subtype: "email",
         label: "Email:",
         className: "form-control",
         name: "text-1475765724095"
       },
       {
         type: "text",
         subtype: "tel",
         label: "Phone:",
         className: "form-control",
         name: "text-1475765724231"
       },
       {
         type: "textarea",
         label: "Short Bio:",
         className: "form-control",
         name: "textarea-1475765724583"
       }
     ],
     terms: [
       {
         type: "header",
         subtype: "h1",
         label: "Terms &amp; Conditions",
         className: "head"
       },
       {
         type: "paragraph",
         subtype: "p",
         label:
           "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in libero quis nibh molestie dapibus. Integer pellentesque massa orci, quis posuere velit fermentum nec. Nullam arcu velit, ornare at urna non, viverra finibus lectus. Curabitur a dui non ipsum maximus faucibus. Quisque a justo purus. Donec volutpat sem vel bibendum pretium. Nulla neque ex, posuere semper urna in, molestie molestie tortor. Maecenas nec arcu sit amet nisl laoreet vestibulum. Cras placerat vulputate maximus. Phasellus ultricies, turpis et efficitur tristique, massa nibh sagittis libero, quis fringilla velit nisl eget augue. Praesent metus nibh, fermentum ut interdum at, lacinia sit amet mauris.",
         className: "paragraph"
       },
       {
         type: "checkbox",
         label: "I agree to the terms",
         className: "checkbox",
         name: "checkbox-1475766391803"
       }
     ],
     issue: [
       {
         type: "text",
         label: "Issue:",
         subtype: "text",
         className: "form-control",
         name: "text-1475766502491"
       },
       {
         type: "text",
         label: "Platform:",
         subtype: "text",
         className: "form-control",
         name: "text-1475766502680"
       },
       {
         type: "textarea",
         label: "Steps to Reproduce:",
         className: "form-control",
         name: "textarea-1475766579522"
       },
       {
         type: "file",
         label: "Screenshot:",
         className: "form-control",
         name: "file-1475766594420"
       },
       {
         type: "select",
         label: "Assign Developer:",
         className: "form-control",
         name: "select-1475766623703",
         multiple: true,
         values: [
           {
             label: "Adam",
             value: "option-1",
             selected: true
           },
           {
             label: "Adrian",
             value: "option-2",
             selected: false
           },
           {
             label: "Alexa",
             value: "option-3",
             selected: false
           },
           {
             label: "Amy",
             value: "",
             selected: false
           }
         ]
       }
     ]
   };
  
   templateSelect.addEventListener("change", function(e) {
     formBuilder.actions.setData(templates[e.target.value]);
   });
  
  
  });
  