<?php
/*
  Plugin Name: Carbon Calculator
  Plugin URI: http://iesr.or.id
  Description: This displays Last Entry From Carbon Calculator
  Author: Erwin Handoko
  Version: 1.0.0
  Author URI: http://inspirably.com
 */

class Carbon_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'carbon_widget', // Base ID
            'Carbon_Widget', // Name
            array('description' => __('A Carbon Widget', 'text_domain'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        global $wpdb;
        $sql = "
            SELECT u.fullname, c.commitment_values,c.commitment_shift FROM ac_commitments c
                LEFT JOIN auth_users u ON u.id = c.user_id
            WHERE 
            c.commitment_status = 1
            ORDER BY commitment_created DESC
            LIMIT 3
        ";
        $myrows = $wpdb->get_results($sql);
        $s = array();
        foreach ($myrows as $r) {
            $baseline = $this->get_total_carbon(json_decode($r->commitment_values,true));
            $shift = $this->get_total_carbon(json_decode($r->commitment_shift,true));
            $s[] = '<p>' . $r->fullname . ' berkomitmen menurunkan emisi gas rumah kaca dari ' . number_format($baseline, 2) . 'gr CO2ek menjadi ' . number_format($shift, 2) . 'gr CO2ek</p>';
        }


        echo $before_widget;
        if (!empty($title))
            echo $before_title . $title . $after_title;
        echo implode('', $s);
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'text_domain');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }

    function get_total_carbon($dbbaseline)
    {


        $blistrik = $this->element('listrik', $dbbaseline, array());
        $bsampah = $this->element('sampah', $dbbaseline, array());
        $bdarat = $this->element('darat', $dbbaseline, array());
        $budara = $this->element('udara', $dbbaseline, array());

        $total = 0;
        foreach ($blistrik as $k => $r) {
            parse_str($r, $d);
            $t = $this->element('total_' . $k, $d, 0);
            $total = $total + $t;
        }
        $total += $this->element('total_sampah', $bsampah, 0);
        $total += $this->element('total_darat', $bdarat, 0);
        $total += $this->element('total_pesawat', $budara, 0);
        return $total;
    }

    function element($item, $array, $default = FALSE)
    {
        return empty($array[$item]) ? $default : $array[$item];
    }

}

// class Foo_Widget

add_action('widgets_init', create_function('', 'register_widget( "carbon_widget" );'));

