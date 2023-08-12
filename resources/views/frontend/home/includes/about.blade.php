<div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
  
    <div class="flex flex-col md:flex-row py-5 m-5 text-left max-w gap-6">
        <div class="md:w-1/4 px-6 pb-6 bg-blue-50 rounded">
                <h1 class="text-xl my-4 font-serif text-gray-dark text-left pb-0 pt-3">Preserving Natural Beauty of Maldives, Together</h1>
        </div>
        <div class="md:w-3/4 px-6 pb-6 bg-gray-50 rounded">
            <p class="lead text-justify">
                <h1 class="text-3xl my-4 font-serif text-gray-dark text-left pb-0 pt-3">Malamathi</h1>

            <p class="py-3 text-justify">Welcome to Malamathi, a community-driven initiative committed to safeguarding the breathtaking natural ecosystems of the Maldives. Our purpose is clear: to empower individuals and communities, uniting them in the protection of this paradise. Our mission involves active engagement, documentation, and raising awareness about the challenges posed by climate change and other human-driven factors.</p>

            <p class="py-3 text-justify"><b>Our Approach</b><br>
            At Malamathi, we're on a journey to enable everyone to become stewards of the Maldives' ecosystems. By providing a platform, we encourage people to share their personal experiences and insights about this incredible corner of the world. Through collaboration, we hope to address environmental issues as a united front.</p>

            <p class="py-3 text-justify"><b>Our Vision</b><br>
            We strongly believe that through careful documentation of the changes our ecosystems undergo, we'll gain invaluable insights. These insights will help us comprehend the challenges that lie ahead. By working in harmony, we can effectively tackle these challenges and ensure the continuity of our invaluable resources.</p>

            <p class="py-3 text-justify"><b>Connect and Contribute</b><br>
            Join us in our collective endeavor to protect the Maldives' ecosystems for generations to come. Your participation matters. Together, we hold the power to drive positive change and create a lasting impact.</p>

            <p class="py-3 text-justify"><b>Let's Work Together</b><br>
            Malamathi invites you to be a part of something greater. It's time to step up, share your perspective, and take action. By preserving the Maldives' natural beauty, we're not only safeguarding our present but also building a sustainable legacy for the future.</p>

            <p class="py-3 text-justify">Come, join us on this meaningful journey. Together, we can make a difference that echoes through time.</p>

            </p>
        </div>

  </div>
  
</div>

<style>
  .introimage-container {
    width: 100%;
    overflow: hidden;
    position: relative;
  }

  .introimage {
    width: 100%;
    height: auto;
    display: block;
  }

  .introimage img {
    width: 100%;
    display: block;
  }

  .introimage:before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:150px;
    height:100%;
    border-left:2px solid rgba(255,255,255,0.7);
    border-right:2px solid rgba(255,255,255,0.7);
    background:url('/addu_by_aishath_naj.png');
    background-attachment:fixed;
    background-position:bottom;
    background-repeat:no-repeat;
    background-size: 100% 100%;
    box-shadow:20px 0 100px rgba(0,0,0,0.2),
                -20px 0 100px rgba(0,0,0,0.2);
    background-size:110%;
    animation: slideAnimate 10s ease-in-out infinite; 
  }

  /**if screen size is mobile then introimage:before width will be 100px */
    @media only screen and (max-width: 600px) {
        .introimage:before{
            width:100px !important;
        }
    }

@keyframes slideAnimate{
  0%,100%{
    left:0px;
  }
  
  50%{
    left:calc(100%);
  }
}
</style>