$(function () {
  fetchOffers();

  const offerList = $("#offerList");

  async function fetchOffers() {
    try {
      const response = await axios.get(
        "http://localhost:5010/api/promotion",
        {
          headers: {
            "Content-Type": "application/json",
          },
        }
      );
      console.log("Fetched Offers:", response.data);

      response.data.forEach((offer) => {
        const imageUrl = offer.promotion_image
          ? `http://localhost:5010${offer.promotion_image}`
          : "";

        const offerCard = `
       <div class="promotion-card col-12 col-sm-6 col-md-4 col-lg-3" >
         ${
           offer.promotion_image
             ? `<img src="${imageUrl}" class="card-img-top card-background" >`
             : ""
         }
         
       </div>
     `;

        console.log("Generated Offer Card:", offerCard);
        offerList.append(offerCard);
      });
    } catch (error) {
      console.error("Error fetching offers:", error);
    }
  }
});