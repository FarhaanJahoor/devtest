<!DOCTYPE html>
<html>
    <head>
        <title> WebDev Test </title>

        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="jquery-3.4.1.min.js"></script>
    </head>
    
    <body>
        <div align="center">
            <h3>Movies that contains 'Red, Green, Blue and Yellow'</h3>
        </div>
    
        <table>
        <tr>
            <th>Title</th>
            <th>Year</th> 
            <th>IMDB ID </th>
            <th> Category </th>
            <th> Poster </th>
        </tr>

        <?php
            
         function highlight1($text, $word){
             if($word=='Red')
             {
                 $text = preg_replace('#'. preg_quote($word) .'#i', '<span class="span1">\\0</span>', $text);
             }
             elseif($word=='Green')
             {
                 $text = preg_replace('#'. preg_quote($word) .'#i', '<span class="span2">\\0</span>', $text);
             }
             elseif($word=='Blue')
             {
                 $text = preg_replace('#'. preg_quote($word) .'#i', '<span class="span3">\\0</span>', $text);
             }
             elseif($word=='Yellow')
             {
                 $text = preg_replace('#'. preg_quote($word) .'#i', '<span class="span4">\\0</span>', $text);
             }

            return $text;
        }
            
        function getImdbRecord($color)
        {
            $path = "http://www.omdbapi.com/?s=".$color."&apikey=8907a6c5";
            $json = file_get_contents($path);
            return json_decode($json, TRUE);

        }



        $datared = getImdbRecord("red");
        $datagreen = getImdbRecord("green");
        $datablue = getImdbRecord("blue");
        $datayellow = getImdbRecord("yellow");

        //Showing 'RED' results
        foreach ($datared as $array)
            {
                foreach ($array as $value) {

                        ?>
                        <tr>
                            <td><?php echo highlight1($value['Title'],'Red'); ?></td>
                            <td><?php echo $value['Year']; ?></td>
                            <td><?php echo $value['imdbID']; ?></td>
                            <td><?php echo $value['Type']; ?></td>
                            <td><img src="<?php echo $value['Poster']; ?>" width="50" height="100"></td>
                        </tr>
                        <?php

                }
                break;
            }

        //Showing 'GREEN' results
        foreach ($datagreen as $array)
            {
                foreach ($array as $value) {
                    ?>
                    <tr>
                        <td><?php echo highlight1($value['Title'],'Green'); ?></td>
                        <td><?php echo $value['Year']; ?></td>
                        <td><?php echo $value['imdbID']; ?></td>
                        <td><?php echo $value['Type']; ?></td>
                        <td><img src="<?php echo $value['Poster']; ?>" width="50" height="100"></td>
                    </tr>
                    <?php
                }
                break;
            }

        //Showing 'BLUE' results
        foreach ($datablue as $array)
            {
                foreach ($array as $value) {
                    ?>
                    <tr>
                        <td><?php echo highlight1($value['Title'],'Blue'); ?></td>
                        <td><?php echo $value['Year']; ?></td>
                        <td><?php echo $value['imdbID']; ?></td>
                        <td><?php echo $value['Type']; ?></td>
                        <td><img src="<?php echo $value['Poster']; ?>" width="50" height="100"></td>
                    </tr>
                    <?php
                }
                break;
            }

        //Showing 'YELLOW' results
        foreach ($datayellow as $array)
            {
                foreach ($array as $value) {
                    ?>
                    <tr>
                        <td><?php echo highlight1($value['Title'],'Yellow'); ?></td>
                        <td><?php echo $value['Year']; ?></td>
                        <td><?php echo $value['imdbID']; ?></td>
                        <td><?php echo $value['Type']; ?></td>
                        <td><img src="<?php echo $value['Poster']; ?>" width="50" height="100"></td>
                    </tr>
                    <?php
                }
                break;
            }


        ?>
        </table>

    </body>
</html>
