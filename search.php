 <link rel="stylesheet" href="ajaxlivesearch.min.css">

<script src="https://code.jquery.com/jquery-1.12.4.min.js"

        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"

        crossorigin="anonymous"></script>

<script src="ajaxlivesearch.min.js"></script>


<?php

$configs = [

  'dataSources'           => [

      'ls_query' => [

          'host'               => 'localhost',

          'database'           => 'Urban Gallery',

          'username'           => 'root',

          'pass'               => '',

          'table'              => 'users',

      

          'searchColumns'      => ['username'],

          

          'filterResult'       => ['username'],

         
          'comparisonOperator' => 'LIKE',



          'searchPattern'      => 'q*',


          'caseSensitive'      => false,


          'maxResult' => 100,
          

          'displayHeader' => [

              'active' => false,

              '<a href="https://www.jqueryscript.net/tags.php?/map/">map</a>per' => [

                  'name' => 'Name',

                  // 'your_second_column' => 'Your Desired Second Title'

              ]

          ],

          'type'               => 'mysqli',

      ]

      
      ]
 ]
      
     ?>
      
      
      
