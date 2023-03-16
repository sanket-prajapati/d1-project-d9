<?php

namespace Drupal\cache_api_example\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides an example block.
 *
 * @Block(
 *   id = "cache_api_example_example",
 *   admin_label = @Translation("Example cache api"),
 *   category = @Translation("cache_api_example")
 * )
 */
class ExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $output = "<p>Some render string is ". rand(1,1000) . "</p>";
    $build['content'] = [
      '#markup' => $output,
      '#cache' => [
        'tags' => [
          // 'node:1',
          // 'node:34',
          // 'node_list',//rendom number chage every time of editing any node
          // 'user_list',//By edit user details and save and view on site rendom number change
          // 'user:13',
          // 'config:system.system_site_information_settings',
          // 'config:media.image_styles_list',
          // 'config:menu_list',
          // 'config:views.view.frontpage',//works
          // 'config:custom_logger.settings_form',//not works
          // 'library_info: '
        ],//While editing and save node 34, random number change. But refreshing or url change it will remain same
        'contexts' => [
          // 'url',//Works If you hit any url
          // 'route',
          // 'route:custom_logger.settings_form'//not works
          // 'route.name:custom_logger.settings_form',//not works
          // 'route:/admin/config/system/custom-logger'//not works
          // 'user.permissions',
          // 'route.custom_logger.settings_form',
          // 'url./admin/config/system/custom-logger',
          // 'url.path./general/about-us',
          // 'url.path.is_front',//works
          // 'url.path',//works
          // 'user.is_super_user',//not works
          // 'user.roles:administrator',//not works
          // 'user.roles',
          // 'user.permissions:view contact entity',//This is custom permission please add First before check //not works
          // 'user.roles:anonymous=1',//not works
        ],
        'max-age' => 0,//every 10 second If you are refreshing page you can see the change in random number
      ],
    ];
    return $build;

    // $output = "<p>Some render string is ". rand(1,1000) . "</p>";
    // $build['content'] = [
    //   '#markup' => $output,
    //   '#cache' => [
    //     'max-age' => 10,//every 10 second If you are refreshing page you can see the change in random number
    //   ],
    // ];
    // return $build;
  }

}
