<?php
        function echoPage($href, $extra){
            global $page;
            $pagenow = $page + 1;
            $pageback = $page - 1;
            $pagenext = $page + 1;
            echo "
                <div class='page'>
                    <a href='$href?page=$pageback$extra'><h2>  <  </h2></a>
                    <h2>   $pagenow   </h2>
                    <a href='$href?page=$pagenext$extra'><h2>  >  </h2></a>
                </div>
                        
            ";
        }
?>