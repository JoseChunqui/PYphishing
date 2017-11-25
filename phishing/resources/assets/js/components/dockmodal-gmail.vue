<template>
  <div>
    <div>
      <div class="dockmodal-overlay" style="display: none;"></div>
    </div>
    <div class="dockmodal dockmodal-normal" v-show="dockVisible_locale">
      <div class="dockmodal-header">
        <a href="#" class="header-action action-close" title="Guardar y cerrar" @click="close_dockmodal"><i class="icon-dockmodal-close"></i></a>
        <a href="#" class="header-action action-maximize" title="Pantalla completa"><i class="icon-dockmodal-popout"></i></a>
        <a href="#" class="header-action action-restore" title="Restore" style="display:none;"><i class="icon-dockmodal-restore"></i></a>
        <a href="#" class="header-action action-minimize" title="Minimize"><i class="icon-dockmodal-minimize"></i></a>
        <a href="#" class="header-action action-normal" title="Maximiza" style="display:none;"><i class="icon-dockmodal-normal"></i></a>
        <div class="title-text">Mensaje Nuevo</div>
      </div>
      <div class="dockmodal-body" style="display: block">
        <div class="dockmodal-container" style="overflow:hidden; height:100%">
          <slot></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      data (){
        return{
          dockVisible_locale : null
        }
      },
      created: function() {
        this.dockVisible_locale = this.dockVisible;
      },
      props: {
          dockVisible: Boolean
      },
      computed:{
        //
      },
      watch:{
        dockVisible : function(){
          this.dockVisible_locale = this.dockVisible
        }
      },
      methods: {
        close_dockmodal: function(){
          this.dockVisible_locale = false;
          this.$emit('update:dockVisible', false);
        }
      },
      mounted() {
        var modal_dock = document.getElementsByClassName("dockmodal")[0];
        var action_minimize = document.getElementsByClassName("action-minimize")[0];
        var action_maximize = document.getElementsByClassName("action-maximize")[0];
        var action_restore = document.getElementsByClassName("action-restore")[0];
        var action_normal = document.getElementsByClassName("action-normal")[0];

        var modal_body = document.getElementsByClassName("dockmodal-body")[0];
        var modal_overlay = document.getElementsByClassName("dockmodal-overlay")[0];

        action_minimize.addEventListener("click", function(){
          modal_dock.classList.remove("dockmodal-normal");
          modal_dock.classList.remove("dockmodal-maximized");
          modal_dock.classList.add("dockmodal-minimized");
          action_minimize.style.display = "none";
          action_restore.style.display = "none";
          action_normal.style.display = "block";
          action_maximize.style.display = "block";
          modal_body.style.display = "none";

          modal_overlay.style.display = "none";
        });
        action_normal.addEventListener("click", function(){
          modal_dock.classList.remove("dockmodal-minimized");
          modal_dock.classList.remove("dockmodal-maximized");
          modal_dock.classList.add("dockmodal-normal");
          action_minimize.style.display = "block";
          action_normal.style.display = "none";

          modal_body.style.display = "block";
          modal_overlay.style.display = "none";
        });
        action_maximize.addEventListener("click", function(){
          modal_dock.classList.remove("dockmodal-normal");
          modal_dock.classList.remove("dockmodal-minimized");
          modal_dock.classList.add("dockmodal-maximized");
          action_maximize.style.display = "none";
          action_normal.style.display = "none";
          action_minimize.style.display = "block";
          action_restore.style.display = "block";

          modal_body.style.display = "block";
          modal_overlay.style.display = "block";
        });
        action_restore.addEventListener("click", function(){
          modal_dock.classList.remove("dockmodal-minimized");
          modal_dock.classList.remove("dockmodal-maximized");
          modal_dock.classList.add("dockmodal-normal");
          action_restore.style.display = "none";
          action_maximize.style.display = "block";
          modal_overlay.style.display = "none";
        });
        modal_overlay.addEventListener("click", function(){
          action_restore.click();
        });


      }
    }
</script>

<style media="screen" scoped>
.dockmodal {
  position: fixed;
  right: 20px;
  bottom: 0;
  top: auto;
  z-index: 991;
  height: 0;
  background: transparent;
  border: 0;
  border-bottom: 0;
  box-shadow: 0 0 5px #000;
  overflow: hidden;
  border: 1px solid #000;
  border: 0 solid rgba(0,0,0,0);
}
.dockmodal-header {
  height: 36px;
  padding: 5px 10px;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  background: #333;
  overflow: hidden;
  cursor: pointer;
  z-index: 1;
}
.dockmodal-header .title-text {
  color: #FFFFFF;
  /*font-size: 16px;*/
  font-size: 80%;
  font-weight: bold;
  line-height: 26px;
  vertical-align: top;
  white-space: nowrap;
  max-width: 100%;
  margin-right: 90px;
  overflow: hidden;
  text-overflow: ellipsis;
}
.dockmodal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 990;
  background-color: rgba(0,0,0,.5);
  opacity: 0.7;
  display: none;
}
.dockmodal, .dockmodal *, .dockmodal *:before, .dockmodal *:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.dockmodal-header .header-action {
  padding: 5px;
  float: right;
  margin-right: 1px;
  line-height: 16px;
}
.dockmodal-header .header-action .icon-dockmodal-close {
  background-position: 0 0;
  width: 16px;
  height: 16px;
}
.dockmodal-header .header-action .icon-dockmodal-normal {
  background-position: 0 -80px;
  width: 16px;
  height: 16px;
}
.dockmodal-header .header-action .icon-dockmodal-popout {
  background-position: 0 -60px;
  width: 16px;
  height: 16px;
}
.dockmodal-header .header-action .icon-dockmodal-minimize {
  background-position: 0 -20px;
  width: 16px;
  height: 16px;
}
.dockmodal-header .header-action .icon-dockmodal-restore {
  background-position: 0 -40px;
  width: 16px;
  height: 16px;
}
.dockmodal-header .header-action i {
  background: url(http://uxmine.com/demo/dockmodal/assets/img/dockmodal-icon.png) no-repeat top left;
  vertical-align: top;
  display: inline-block;
  zoom: 1;
}
.dockmodal-header .header-action:hover {
  background: #555;
}
.dockmodal-body {
  background: #FFF;
  position: absolute;
  top: 36px;
  bottom: 0px;
  left: 0;
  right: 0;
  overflow: auto;
  /*padding: 10px 15px;*/
}

.dockmodal-normal{
  height: 65%; width: 600px; left: auto; right: 10px; top: auto; bottom: 0px;
}
.dockmodal-minimized{
  height: 36px; width: 260px; left: auto; right: 10px; top: auto; bottom: 0px;
}
.dockmodal-maximized{
  height: auto; width: auto; left: 6%; right: 6%; top: 6%; bottom: 6%;
}
</style>
