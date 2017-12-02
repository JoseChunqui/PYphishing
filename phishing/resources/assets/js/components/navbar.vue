<template>
  <v-app id="inspire">
    <v-navigation-drawer
      permanent
      fixed
      clipped
      app
      style="width: 200px; padding-right: 20px"
    >
      <v-list dense>
        <template>
          <v-list-tile style="height: 50px">
            <v-list-tile-content class="text--black">
              <v-list-tile-title style="height: 50px; margin-left: 8px">
                <v-btn color="error" @click="sig_visible = true">Redactar</v-btn>
              </v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </template>
        <template v-for="(item, i) in items">
          <v-list-tile :key="i" @click="" style="height: 30px; margin-left: 14px">
            <v-list-tile-content class="text--black">
              <v-list-tile-title>
                {{ item.text }}
              </v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </template>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar fixed color="grey lighten-3" app prominent extended clipped-left class="elevation-0" style="height:64px;">
      <img src="https://www.google.com/a/uni.pe/images/logo.gif?alpha=1&service=google_default" alt="" style="max-width:144px;max-height:60px">
      <v-text-field solo class="elevation-0 ml-4" prepend-icon="search" placeholder="Search"></v-text-field>
      <!-- <v-text-field prepend-icon="search" hide-details single-line></v-text-field> -->
      <v-spacer></v-spacer>
      <v-btn icon>
        <v-icon>apps</v-icon>
      </v-btn>
      <v-btn icon>
        <v-icon>notifications</v-icon>
      </v-btn>
      <v-btn icon large>
        <v-avatar size="32px" tile>
          <img id="img" style="border-radius: 50%;" height="32" width="32" src="https://yt3.ggpht.com/-wjcW8E9g7z4/AAAAAAAAAAI/AAAAAAAAAAA/GYTmkqCc3Zg/s88-c-k-no-mo-rj-c0xffffff/photo.jpg">
        </v-avatar>
      </v-btn>
      <v-toolbar slot="extension" color="white" class="mr-0 mt-0 ml-0 elevation-0" style="border-bottom: solid 1px black">
        <div class="mb-0 mt-0 ml-2" style="color: #dd4b39; cursor: pointer;font-size: 14pt;line-height: 29px;">
          Correo
        </div>
        <div class="mb-0 mt-0 mr-5" style="margin-left: 6px;height: 5px; width: 7px; background: url(//ssl.gstatic.com/ui/v1/icons/mail/pimages/2/arrow_down_tlp.png) no-repeat;font-size: 0;"></div>
        <img class="mb-0 mt-0 ml-5 mr-0" :src="toolbarImage" alt="1">
      </v-toolbar>
    </v-toolbar>
    <v-content style="padding: 128px 0px 0px 200px;">
      <div fluid color="white">
        <v-layout>
          <slot></slot>
          <vue-dockmail :dock-visible.sync="sig_visible">
            <div style="overflow:hidden; height:100%">
              <table cellpadding="0" cellspacing="0" style="width:100%;position:relative;height:100%">
                <tbody>
                  <tr style="max-height: 41px;height: 41px;">
                    <td style="padding:10px; border-bottom: 1px solid #eeeeee">
                      <div style="display: flex;margin: 0px; width:100%; border: 0px;">
                        <div v-show="recipients_clicked" style="margin-right:10px">
                          <span style="color: #777">Para</span>
                        </div>
                        <div style="margin: 0px; width:83%; border: 0px;">
                          <input type="text" ref="recipients_input" name="" @focus="recipients = ''; recipients_clicked = true" @blur="recipients = 'Destinatarios'; recipients_clicked = false" :placeholder="recipients" value="">
                        </div>
                        <div v-show="recipients_clicked" style="margin-left:10px">
                          <span style="color: #777">Cc Cco</span>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr style="max-height: 41px;height: 41px;">
                    <td style="padding:10px; border-bottom: 1px solid #eeeeee">
                      <input type="text" name="" placeholder="Asunto" value="" style="margin: 0px; width:100%; border: 0px;">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <textarea name="name" style="padding:10px; min-height:100px;height:100%;width:100%"></textarea>
                    </td>
                  </tr>
                  <tr style="max-height: 41px;height: 41px;">
                    <td style="background-color: #f5f5f5;">
                      <v-btn-toggle>
                        <v-btn flat>
                          <v-icon>format_bold</v-icon>
                        </v-btn>
                        <v-btn flat>
                          <v-icon>format_italic</v-icon>
                        </v-btn>
                        <v-btn flat>
                          <v-icon>format_underlined</v-icon>
                        </v-btn>
                        <v-btn flat>
                          <v-icon>format_color_fill</v-icon>
                        </v-btn>
                        <v-btn flat value="left">
                          <v-icon>format_align_left</v-icon>
                        </v-btn>
                        <v-btn flat value="center">
                          <v-icon>format_align_center</v-icon>
                        </v-btn>
                        <v-btn flat value="right">
                          <v-icon>format_align_right</v-icon>
                        </v-btn>
                        <v-btn flat value="justify">
                          <v-icon>format_align_justify</v-icon>
                        </v-btn>
                      </v-btn-toggle>
                    </td>
                  </tr>
                  <tr style="max-height: 41px;height: 41px;">
                    <td style="background-color: #f5f5f5;">
                      <v-btn small color="primary">Enviar</v-btn>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </vue-dockmail>
        </v-layout>
      </div>
    </v-content>
  </v-app>
</template>

<script>
  export default {
    data: () => ({
      items: [
        { text: 'Recibidos' },
        { text: 'Destacados' },
        { text: 'Enviados' },
        { text: 'Borradores(1)' },
        { text: 'Trash' }
      ],
      sig_visible: false,
      recipients: 'Destinatarios',
      recipients_clicked: false
    }),
    watch:{
      //
    },
    methods: {

    },
    props: {
      source: String,
      toolbarImage: String
    }
  }
</script>

<style>
  #keep main .container {
    height: 660px;
  }
  .navigation-drawer__border {
    display: none;
  }
  .text {
    font-weight: 400;
  }
</style>
