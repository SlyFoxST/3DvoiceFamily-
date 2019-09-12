<footer id="yakor3">
  <div class="container flex df-footer">
    <div class="contact-df-info">

      <div class="df-footer-title">Живи ярко, будь на высоте!</div>
      <div class="df-footer-slogon">Организация праздников, канцертов, шоу-программ</div>
      <div class="df-footer-title">Контакты</div>
      <ul>
        <li><a hrf="meilto:3dvoiceFaily@gmail.com">3dvoiceFaily@gmail.com</li>
          <li><a hrf="tel:+38055 555 55 55">+38055 555 55 55</li>
            <li><a hrf="#">Славянск, ул.Центральная 12</li>
            </ul>
          </div>
          <div class="menu-footer">
            <div class="df-footer-title">Меню</div>
            <?php
            wp_nav_menu(array(
              'theme_location'  => 'footer_menu',
              'container'       => 'div', 
              'container_class' => 'footer-mnu', 
              'container_id'    => 'foot-mnu',
              'menu_class'      => 'df-menu-footer', 
              'echo'            => true,
              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'walker'          => '',
              ));?>
            </div>
            <div class="gallery-footer">
            <!--   <div class="df-footer-title">Галерея инстаргамм:</div> -->
              <?php dynamic_sidebar('sidebar-inst');?>

            </div>
            <div>
              <div class="df-footer-title">Мы в соц.сетях</div>
              <div  class="df-social">
                <?php 
                $soc = get_post_meta(44,"admin_instagramm",true);
                $soc2 = get_post_meta(44,'admin_facebook',true);
                $soc3 = get_post_meta(44,"admin_vk",true);
                if(!empty($soc)):
                ?>
                <a href="<?php echo $soc;?>"><img src="<?php echo get_template_directory_uri()?>/img/icon-05.svg"></a>
              <?php endif;
                if(!empty($soc2)):
              ?>
                <a href="<?php echo $soc2;?>"><img src="<?php echo get_template_directory_uri();?>/img/icon-01.svg" /></a>
              <?php endif;
                if(!empty($soc3)):
              ?>
                <a href="<?php echo $soc3;?>"><img src="<?php echo get_template_directory_uri();?>/img/icon-06.svg" /></a>
              <?php endif;?>
              </div>
            </div>
          </div>
        </footer>


        <script>
         jQuery(function($){
           $('#filter').submit(function(){
            var filter = $(this);
            $.ajax({
			url:ajaxurl, // обработчик
			data:filter.serialize(), // данные
			type:filter.attr('method'), // тип запроса
			beforeSend:function(xhr){
				filter.find('button').text('Загружаю...'); // изменяем текст кнопки
			},
			success:function(data){
				filter.find('button').text('Применить фильтр'); // возвращаеи текст кнопки
				$('#response').html(data);
			}
		});
            return false;
          });
         });
         jQuery(document).ready(function(){
 //      $('.btn-z').click(function(e){
 //       e.preventDefault();
 //       var param1 = $("input[name*='name-z']").val();
 //       var param2 = $("input[name*='tel-z']").val();
 //       var param3 = $(".text-msg").val();
 //       var msg = $(".msg");
 //       $.ajax({
 //        url: '<?php //echo admin_url("admin-ajax.php") ?>',
 //        type: 'POST',
	// 		data: 'action=mail&param='+param1+'&param2='+param2+'&param3='+param3, // можно также передать в виде массива или объекта
	// 	 //    beforeSend: fucntion(xhr){
	// 		//  	$(this).text('Загрузка, 5 сек...');	
	// 		// },
	// 		success: function( data ) {
	// 			$('.btn-z').text('ok');	

 //        // wp_mail('yagoda303@gmail.com', 'Какая-то тема', 'ntrcn');
 //       alert( data );
 //       msg.text(data);
 //     }
 //   });
	// 	// если элемент – ссылка, то не забываем:
	// 	// return false;
	// });
		// var array = [];
		// $(':checkbox').click(function(){
		// 	array.push($(this).attr("value"));

		// 	alert($(this).attr("value"));
		// });

   particlesJS("particles-js", {
    "particles": {
      "number": {
        "value": 80,
        "density": {
          "enable": true,
          "value_area": 700
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        },
      },
      "opacity": {
        "value": 0.5,
        "random": false,
        "anim": {
          "enable": false,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 3,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 40,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 6,
        "direction": "none",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "grab"
        },
        "onclick": {
          "enable": true,
          "mode": "push"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 140,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 400,
          "size": 40,
          "duration": 2,
          "opacity": 8,
          "speed": 3
        },
        "repulse": {
          "distance": 200,
          "duration": 0.4
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true
  });	

 });
</script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.bxslider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/custom.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/slick.min.js"></script>
<?php wp_footer();?>
</body>
</html>