<?php
class Pagination
{
    public static function createPageLinks($x,$totalRow, $perPage, $page,$id,$limit,$sort)
    {
        $numberPage = ceil($totalRow / $perPage);
        $next = $page;
        $disableNext = '';
        $prev = $page;
        $disablePrev = '';


        if($page < $numberPage) {
            $next++;
        }
        else {
            $disableNext = 'disabled';
        }

        if($page > 1) {
            $prev--;
        }
        else {
            $disablePrev = 'disabled';
        }

        $output = '<nav aria-label="...">
        <ul class="pagination">
          <li class="page-item ' . $disablePrev .'">
            <a class="page-link" href="?'.$x.'='.$id.'&limit='.$limit.'&sort='.$sort.'&page=' . $prev . '" tabindex="-1" aria-disabled="true">Previous</a>
          </li>';

        for ($i=1; $i <= $numberPage; $i++) {
            $active = ($page == $i) ? 'active' : '';
            $output .= '<li class="page-item '. $active .'"><a class="page-link" href="?'.$x.'='.$id.'&limit='.$limit.'&sort='.$sort.'&page=' . $i . '">' . $i . '</a></li>';
        }

        $output .= '<li class="page-item ' . $disableNext .'">
                <a class="page-link" href="?'.$x.'='.$id.'&limit='.$limit.'&sort='.$sort.'&page=' . $next . '">Next</a>
            </li>
        </ul>
        </nav>';
        
        return $output;
    }
}