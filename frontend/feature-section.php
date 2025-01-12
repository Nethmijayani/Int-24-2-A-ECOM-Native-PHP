<?php
function renderFeatureSection() {
    echo '
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
            width: 130px;
            height: auto;
            max-width: 150px;
            display: block;
            margin: 15px auto;
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
        <div class="col-sm-3 mb-sm-0">
            <div class="card">
                <img class="card-image" src="./assets/images/feature-24h-service.png" alt="24h-service" />
                <div class="card-body">
                    <h5 class="card-title">24/7 Service</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <img class="card-image" src="./assets/images/feature-pizza.png" alt="Pizza" />
                <div class="card-body">
                    <h5 class="card-title">Fresh Pizza</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <img class="card-image" src="./assets/images/feature-delivery.png" alt="Delivery" />
                <div class="card-body">
                    <h5 class="card-title">Fast Delivery</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <img class="card-image" src="./assets/images/feature-dessert.png" alt="Dessert" />
                <div class="card-body">
                    <h5 class="card-title">Sweet Desserts</h5>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll(".card");
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
    ';
}
