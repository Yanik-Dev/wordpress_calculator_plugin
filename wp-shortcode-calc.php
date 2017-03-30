<?php 


function get_calculatr(){
    return <<<EOC
        <div id="container">
            <div id="header">
                <h1>Calculatr</h1>
            </div>
            <div id="output-screen">
                <input type="text" placeholder="0" id="output" disabled>
            </div>
            <div id="buttons">
                <!-- buttons -->
                <div class="row">
                    <div class="col"><button value="LOG" onclick="buttonClickHandler(this)" class="sci-btn">log </button></div>
                    <div class="col"><button value="SQRT" onclick="buttonClickHandler(this)" class="sci-btn">&radic;</button></div>
                    <div class="col"><button value="CUBRT" onclick="buttonClickHandler(this)" class="sci-btn">&#8731;</button></div>
                    <div class="col"><button class="c-btn">CE</button></div>
                    <div class="col">
                        <button  class="c-btn"  onclick="clearOutput()">C</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col"><button value="^" onclick="buttonClickHandler(this)" class="sci-btn">n<sup>x</sup></button></div>
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

add_shortcode('calculatr', 'get_calculatr');

function add_calc_scripts() {
  wp_enqueue_style( 'style', plugin_dir_url(__FILE__) . '/css/style.css', array(), '1.1', 'all');
  wp_enqueue_script( 'script', plugin_dir_url(__FILE__) . '/js/script.js', array ( ), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'add_calc_scripts' );
?>