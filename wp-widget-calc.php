<?php 
/**
 * Defines Calculatr widget.
 */
class Calculatr extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Calculatr', // Base ID
			esc_html__( 'Calculator', 'text_domain' ), // Name
			array( 'description' => esc_html__('A stylish calculator to perform basic scientific calculations', 'text_domain' ), ) // Args
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
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo <<<EOC
        <div id="container" style="marign-left: -20px !important;">
        <div id="header">
            <h1>Calculatr</h1>
        </div>
        <div id="output-screen">
            <input type="text" placeholder="0" id="output" disabled>
        </div>
        <div id="buttons">
            <!-- buttons -->
            <div class="row">
                <div class="col"><button value="LOG" onclick="buttonClickHandler(this)" class="sci-btn">ln </button></div>
                <div class="col"><button value="SQRT" onclick="buttonClickHandler(this)" class="sci-btn">&radic;</button></div>
                <div class="col"><button value="CUBRT" onclick="buttonClickHandler(this)" class="sci-btn">&#8731;</button></div>
                <div class="col">
                    <button class="c-btn extend" onclick="clearOutput()">C</button>
                </div>
            </div>

            <div class="row">
                <div class="col"><button value="^" onclick="buttonClickHandler(this)" class="sci-btn">x<sup>y</sup></button></div>
                <div class="col"><button value="7" onclick="buttonClickHandler(this)" class="num-btn">7</button></div>
                <div class="col"><button value="8" onclick="buttonClickHandler(this)" class="num-btn">8</button></div>
                <div class="col"><button value="9" onclick="buttonClickHandler(this)" class="num-btn">9</button></div>
                <div class="col"><button value="/" onclick="buttonClickHandler(this)" class="basic-btn">&divide</button></div>
            </div>

            <div class="row">
                <div class="col"><button value="SIN" onclick="buttonClickHandler(this)" class="sci-btn">sin</button></div>
                <div class="col"><button value="6" onclick="buttonClickHandler(this)" class="num-btn">6</button></div>
                <div class="col"><button value="5" onclick="buttonClickHandler(this)" class="num-btn">5</button></div>
                <div class="col"><button value="4" onclick="buttonClickHandler(this)" class="num-btn">4</button></div>
                <div class="col"><button value="*" onclick="buttonClickHandler(this)" class="basic-btn">&times;</button></div>
            </div>

            <div class="row">
                <div class="col"><button value="COS" onclick="buttonClickHandler(this)" class="sci-btn">cos</button></div>
                <div class="col"><button value="2" onclick="buttonClickHandler(this)" class="num-btn">2</button></div>
                <div class="col"><button value="3" onclick="buttonClickHandler(this)" class="num-btn">3</button></div>
                <div class="col"><button value="1" onclick="buttonClickHandler(this)" class="num-btn">1</button></div>
                <div class="col"><button value="-" onclick="buttonClickHandler(this)" class="basic-btn">-</button></div>
            </div>

            <div class="row">
                <div class="col"><button value="TAN" onclick="buttonClickHandler(this)" class="sci-btn">tan</button></div>
                <div class="col"><button value="%" onclick="buttonClickHandler(this)" class="sci-btn">mod</button></div>
                <div class="col"><button value="0" onclick="buttonClickHandler(this)" class="num-btn">0</button></div>
                <div class="col"><button onclick="calculate()" id="equal-btn">=</button></div>
                <div class="col"><button value="+" onclick="buttonClickHandler(this)" class="basic-btn">+</button></div>
            </div>
            <!-- /main buttons -->
        </div>
    </div>
EOC;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
	<?php 
	}

}

// register Calculatr widget
function register_Calculatr() {
    register_widget( 'Calculatr' );
}
add_action( 'widgets_init', 'register_Calculatr' );
?>