<?php

require_once "../app/Core/Controller.php";

class Movie extends Controller
{

    public function Index()
    {
        $this->view('Movie');
    }

    private function MovieList($title, $img, $modal_id, $year, $rating) {
        return '<div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex flex-column my-2 card-effect">' // Adjust the column classes
        . '<div class="card primary-color flex-grow-1 shadow w-100 inner-card-effect p-lg-2">' // Remove the width styles
        . '<a data-bs-toggle="modal"><img src="' . $img . '" alt="' . $title . '" style="height: 100%; width: 100%;"></a>' // Set image width to 100% and height to auto
        . '<div class="card-body my-5 primary-color">'
        . '<h5 class="card-title" style="color: white;">' . $title . '</h5>'
        . '</div>'
        . '<ul class="primary-color ">'
        . '<li class="list-group-item primary-color d-flex text-end my-3 " style="color: white; font-size:0.8rem;"><button type="button" class="border-0 rounded-5 shadow-lg browse-button" data-bs-toggle="modal" data-bs-target="#' . $modal_id . '">'
        . '<i class="bi bi-info-circle fs-5"></i>'
        . '</button>'
        . '</li>'
        . '<li class="list-group-item primary-color" style="color: white; font-size:0.8rem;">' . $year . '</li>'
        . '</ul>'
        . '<ul class="primary-color d-flex justify-content-between">'
        . '<li class="list-group-item primary-color" style="color: white; font-size:0.8rem;">Up to IMAX</li>'
        . '<li class="list-group-item primary-color d-flex text-end" style="color: white; font-size:0.8rem; margin-right:0.5rem;">' . number_format($rating, 1) . '<i class="bi bi-star-fill px-2" style="color:#CCC830"></i></li>'
        . '</ul>'
        . '</div>'
        . '</div>';
    }

    private function Modal($modal_id, $title, $movie) {
        return '<div class="modal fade" id="' . $modal_id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">'
        . '<div class="modal-dialog">'
        . '<div class="modal-content" style="background-color: hsl(200, 9%, 19%);">'
        . '<div class="modal-header">'
        . '<h1 class="text-white title" id="logo">i<small id="accent" class="fw-bolder">M</small>ovie</h1>'
        . '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: #CCC830;"></button>'
        . '</div>'
        . '<div class="modal-body fs-4" style="color: #CCC830;">' . $title . '</div>'
        . '<div class="modal-body" style="color: white;">' . $movie['overview']
        . '<p style="color: white;" class=" mt-5 ">Duration: 100 seconds</p>'
        . '<p style="color: white;">Price: $xxx.xx</p>'
        . '<p style="color: white;">Schedule: Monday, May 12, 2024</p>'
        . '</div>'
        . '<div class="modal-footer">'
        . '<button type="button" class="btn btn-primary mt-5 w-100 browse-button shadow-lg fw-semibold" data-bs-dismiss="modal">Return</button>'
        . '</div>'
        . '</div>'
        . '</div>'
        . '</div>';
    }

}