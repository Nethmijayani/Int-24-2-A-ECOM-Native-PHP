<?php
// Data for the cards
$cards = [
    ['img' => './assets/images/feature-pizza-img1.jpg', 'title' => 'Healthy', 'alt' => 'Healthy'],
    ['img' => './assets/images/feature-pizza-img3.jpg', 'title' => 'Happy', 'alt' => 'Happy'],
    ['img' => './assets/images/feature-pizza-img1.jpg', 'title' => 'Christmas', 'alt' => 'Christmas'],
    ['img' => './assets/images/feature-pizza-img3.jpg', 'title' => 'Fresh', 'alt' => 'Fresh']
];
?>

<div id="feature-section">
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 10px !important;
        }
        .card {
            margin: 5px 0 0 0;
            padding: 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
            text-align: center;  
            opacity: 0; 
            transform: translatey(150px); 
            transition: opacity 1s ease, transform 1s ease; 
        }
        .card.visible {
            opacity: 1; 
            transform: translateX(0); 
        }
        .card-image {
            width: 150px;
            height: auto;
            max-width: 150px;
            display: block;
            border-radius: 10px;
            margin: 10px auto;
        }
        .card-image:hover {
            -webkit-transform: scale(-1);
            transform: scalex(-1);
            transition: 1.5s;
        }
        .card-title:hover {
            color: #c59d5f;
        }
    </style>
    <div class="row">
        <?php foreach ($cards as $card): ?>
        <div class="col-sm-3 mb-sm-0">
            <div class="card">
                <img class="card-image" src="<?= $card['img'] ?>" alt="<?= $card['alt'] ?>" />
                <div class="card-body">
                    <h5 class="card-title"><?= $card['title'] ?></h5>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cards = document.querySelectorAll("#feature-section .card");

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("visible");
                    } else {
                        entry.target.classList.remove("visible");
                    }
                });
            },
            { threshold: 0.1 }
        );

        cards.forEach((card) => observer.observe(card));
    });
</script>
