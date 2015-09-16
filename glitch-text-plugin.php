<?php
/*
Plugin Name: Glitch text
Plugin URI: http://www.rodrigoconstanzo.com/thesis/
Description: Bzzzt bzzt bzzt
Version: 0.2
Author: MADWORT
Author URI: http://www.madwort.co.uk
*/

add_shortcode('glitch_text', 'glitch_text_handler');

function glitch_text_handler($atts)
{
  return "
<svg version=\"1.1\" id=\"Ebene_1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" 
  width=\"650px\" height=\"200px\" viewBox=\"0 0 650 200\" style=\"float: left;\">
<style type=\"text/css\">

<![CDATA[

  text {
    filter: url(#filter);
    fill: black;
    font-family: Helvetica, sans-serif;
    font-size: 2.45em;
    font-weight: bold;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
]]>
</style>
  <defs>

    <filter id=\"filter\">
      <feFlood flood-color=\"white\" result=\"white\" />
      <feFlood flood-color=\"pink\" result=\"flood1\" />
      <feFlood flood-color=\"limegreen\" result=\"flood2\" />
      <feOffset in=\"SourceGraphic\" dx=\"2\" dy=\"0\" result=\"off1a\"/>
      <feOffset in=\"SourceGraphic\" dx=\"1\" dy=\"0\" result=\"off1b\"/>
      <feOffset in=\"SourceGraphic\" dx=\"-3\" dy=\"0\" result=\"off2a\"/>
      <feOffset in=\"SourceGraphic\" dx=\"-2\" dy=\"0\" result=\"off2b\"/>
      <feComposite in=\"flood1\" in2=\"off1a\" operator=\"in\"  result=\"comp1\" />
      <feComposite in=\"flood2\" in2=\"off2a\" operator=\"in\" result=\"comp2\" />

      <feMerge x=\"0\" width=\"100%\" result=\"merge1\">
        <feMergeNode in = \"white\" />
        <feMergeNode in = \"comp1\" />
        <feMergeNode in = \"off1b\" />

<!--
        The red base text is on an infinite loop (ie. always displays)
-->

        <animate attributeName=\"y\" 
          id = \"y\"
          dur =\"60s\"
          values = '104px; 102px'
          keyTimes = '0; 1'
          repeatCount = \"indefinite\" 
        />
 
        <animate attributeName=\"height\" 
          id = \"h\" 
          dur =\"60s\"
          values = '50px; 50px'
          keyTimes = '0; 1'
          repeatCount = \"indefinite\" 
        />
      </feMerge>

      <feMerge x=\"0\" width=\"100%\" y=\"60px\" height=\"65px\" result=\"merge2\">
        <feMergeNode in = \"white\" />
        <feMergeNode in = \"comp2\" />
        <feMergeNode in = \"off2b\" />
<!-- 
        We have a 60 second loop for the green overlay text
        Each glitch event is three keyTimes starting at:
          0.085 => 5.1 seconds
          0.333 => 19.98 seconds
          0.75 => 45 seconds
-->

        <animate attributeName=\"y\" 
          id = \"y\"
          dur =\"60s\"
          values = '103px; 104px; 5px; 104px; 104px; 190px; 104px; 104px; 70px; 104px; 104px;' 
          keyTimes = '0; 0.085; 0.086; 0.087; 0.333; 0.334; 0.335; 0.75; 0.751; 0.752; 1'
          repeatCount = \"indefinite\" 
        />
 
        <animate attributeName=\"height\" 
          id = \"h\"
          dur = \"60s\"
          values = '16px; 16px; 10px; 16px; 16px; 50px; 16px; 16px; 20px; 16px; 16px'
          keyTimes = '0; 0.085; 0.086; 0.087; 0.333; 0.334; 0.335; 0.75; 0.751; 0.752; 1'
          repeatCount = \"indefinite\" />
        </feMerge>

        <feMerge>
          <feMergeNode in=\"SourceGraphic\" />  
          <feMergeNode in=\"merge1\" /> 
          <feMergeNode in=\"merge2\" />
        </feMerge>
      </filter>
  </defs>
  <g>
    <text x=\"0\" y=\"0\">" .

    // approx pixel widths of these lines on Tom's browser
    // 516px => (650 - 516)/2 = 67
    // 650px => (650 - 650)/2 = 0
    // 311px => (650 - 311)/2 = 169.5
    // 466px => (650 - 466)/2 = 92

"
      <tspan x=\"67px\" dy=\"1.2em\">Composition, Performance,</tspan>
      <tspan x=\"0\" dy=\"1.2em\">Improvisation, and Making Things,</tspan> 
      <tspan x=\"169px\" dy=\"1.2em\">sitting in a tree :</tspan>
      <tspan x=\"92px\" dy=\"1.2em\">Me-Me-Me-Me-Me-Me-Me</tspan>
    </text>
  </g>
</svg>";

}

?>
