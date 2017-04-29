<?php
/**
 * BillingSimpel
 * Version 2.0
 * Copyright, 2016 Dimas Pratama.
 *
 * @package BillingSimpel
 * @link https://dimaspratama.com/CekMutasi/
 * @author Widigdo Dimas Pratama (widigdo@dimaspratama.com)
 * @copyright 2016 Widigdo Dimas Pratama
 * Date Created: 21 August 2016
 */

/* Pagination */
function makePagination( $query, $per_page = 25, $page = 1, $url = '&' ) {                                                                                                      /* Dimas */
    global $conn;
    $query = "SELECT COUNT(*) as `num` FROM {$query}";
    $row = mysqli_fetch_array( mysqli_query( $conn, $query ) );
    $total = $row['num'];
    $adjacents = "2";

    $page = ( $page == 0 ? 1 : $page );
    $start = ( $page - 1 ) * $per_page;

    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil( $total/$per_page );
    $lpm1 = $lastpage - 1;
    $pagination = "";
    if ( $lastpage > 1 ) {
        $pagination .= "<ul class='pagination'>";
        if ( $lastpage < 7 + ( $adjacents * 2 ) ) {
            for ( $counter = 1; $counter <= $lastpage; $counter++ ) {
                if ( $counter == $page )
                    $pagination.= "<li class='active'><a>$counter</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
            }
        }
        elseif ( $lastpage > 5 + ( $adjacents * 2 ) ) {
            if ( $page < 1 + ( $adjacents * 2 ) ) {
                for ( $counter = 1; $counter < 4 + ( $adjacents * 2 ); $counter++ ) {
                    if ( $counter == $page )
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                }
                $pagination.= "<li>...</li>";
                $pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
            }
            elseif ( $lastpage - ( $adjacents * 2 ) > $page && $page > ( $adjacents * 2 ) ) {
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li>...</li>";
                for ( $counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++ ) {
                    if ( $counter == $page )
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
            }
            else {
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li>..</li>";
                for ( $counter = $lastpage - ( 2 + ( $adjacents * 2 ) ); $counter <= $lastpage; $counter++ ) {
                    if ( $counter == $page )
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                }
            }
        }

        if ( $page < $counter - 1 ) {
            $pagination .= "<li><a href='{$url}page=$lpm1' aria-label='Previous'><span aria-hidden='true'>«</span></a></li>";
            $pagination.= "<li><a href='{$url}page=$lastpage' aria-label='Next'><span aria-hidden='true'>»</span></a></li>";
        }else {     
            $pagination.= '<li><a aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
            $pagination.= '<li><a aria-label="Next"><span aria-hidden="true">»</span></a></li>';
        }
        $pagination.= "</ul>\n";
    }


    return $pagination;
}
/* End Pagination */