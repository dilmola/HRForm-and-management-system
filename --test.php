<label class="btn prooptions" for="modal-1" href="#">Open</label>

<input class="modal-state" id="modal-1" type="checkbox" />
<div class="modal">
  <label class="modal__bg" for="modal-1"></label>
  <div class="modal__inner">
    <label class="modal__close" for="modal-1"></label>
    <h2>Get HTML Content from URL</h2>
	<div id="dynamic" class="hidden"></div>
  </div>
</div>


<style>/* [Object] Modal
 * =============================== */
 
 
 .btn {
  cursor: pointer;
  background: #27ae60;
  display: inline-block;
  padding: .5em 1em;
  color: #fff;
  border-radius: 3px;
}

.btn:hover,
.btn:focus {
  background: #2ecc71;
}

.btn:active {
  background: #27ae60;
  box-shadow: 0 1px 2px rgba(0,0,0, .2) inset;
}

.btn--blue {
  background: #2980b9;
}

.btn--blue:hover,
.btn--blue:focus {
  background: #3498db;
}

.btn--blue:active {
  background: #2980b9;
}

 
 
.modal {
  opacity: 0;
  visibility: hidden;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  text-align: left;
  background: rgba(0,0,0, .9);
  transition: opacity .25s ease;
  z-index:99999999999999999999999999999999999999999999999999999999999999999999999999999;
}

.modal__bg {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  cursor: pointer;
}

.modal-state {
  display: none;
}

.modal-state:checked + .modal {
  opacity: 1;
  visibility: visible;
}

.modal-state:checked + .modal .modal__inner {
  top: 0;
}

.modal__inner {
  transition: top 1.25s ease;
  position: absolute;
  top: -20%;
  right: 0;
  bottom: 0;
  left: 0;
  width: 50%;
  margin: auto;
  overflow: auto;
  background: #fff;
  border-radius: 5px;
  padding: 1em 2em;
  height: 50%;
}

.modal__close {
  position: absolute;
  right: 1em;
  top: 1em;
  width: 1.1em;
  height: 1.1em;
  cursor: pointer;
}

.modal__close:after,
.modal__close:before {
  content: '';
  position: absolute;
  width: 2px;
  height: 1.5em;
  background: #ccc;
  display: block;
  transform: rotate(45deg);
  left: 50%;
  margin: -3px 0 0 -1px;
  top: 0;
}

.modal__close:hover:after,
.modal__close:hover:before {
  background: #aaa;
}

.modal__close:before {
  transform: rotate(-45deg);
}

@media screen and (max-width: 768px) {
	
  .modal__inner {
    width: 90%;
    height: 90%;
    box-sizing: border-box;
  }
}

.hidden {
    display: none;
}

</style>

<script>

  
$(".prooptions").click(loadDynamic);  
  
  function loadDynamic() {  
      $("#dynamic")  
      .load("https://dl.dropboxusercontent.com/s/6ro896byol223p0/ajax-data.txt?dl=1&token_hash=AAEhOzpJgzb71h8X_olqovBCKz0GF2BCXJogeZ0RIoWXoQ", // URL with only <div> content & dont load <head> or <html> or <body> etc...     
              // Callback function on completion (optional)  
              function (content) {  
                  // make content visible with effect  
                  $(this).hide().fadeIn("slow");  
                  return false;  
              });  
  } 
</script>