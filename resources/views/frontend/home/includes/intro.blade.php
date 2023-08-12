  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">

    <div class="flex flex-col md:flex-row py-5 m-5 text-left max-w gap-6">
        <div class="md:w-2/3 ">
        <div class="introimage-container">
        <div class="introimage">
            <img src="/addu_by_aishath_naj.png" alt="Intro Image">
        </div>
        </div>
    </div>

    <div class="md:w-1/3 px-6 ">
        <h1 class="text-2xl my-4 font-serif font-bold text-gray-dark  py-5">Let’s Document our Raajje!</h1>

        <p class="lead text-xl my-6">
            Do you have a story to tell? A snap to share? A concern to raise?
        </p>
        <p class="lead text-left my-6">
            <a class="btn btn-success px-5 py-3 text-xl rounded bg-green-100 hover:bg-green-200 active:bg-green-300" href="#" role="button">Be A Witness</a>
        </p>
    </div>

    </div>

    <div class="flex flex-col md:flex-row py-5 m-5 text-left max-w gap-6">
        <div class="md:w-2/3 px-6 pb-6 bg-gray-50">
            <h1 class="text-2xl my-4 font-serif font-bold text-gray-dark text-left pb-0">Our Mission</h1>
            <p class="lead">To protect, preserve and pass it to the next generation we need to know what’s out there and what changes are occurring to its ecosystems due to climate change and other factors! The aim of Malamathi is to empower communities and individuals to take part in documenting the ecosystems of Maldives. Share with us and take part in this community effort to document the Maldives and changes to its ecosystems over time!</p>
        </div>

        <div class="md:w-1/3 px-6 pb-6 bg-gray-50">
            <h1 class="text-2xl my-4 font-serif font-bold text-gray-dark text-left pb-0">Contact Us</h1>
            <p class="lead">
            H. V Kanmmathi 10, 10136 Turin Male', Maldives <br>
            Phone: (0039) 333 12 68 347 <br>
            Email: hello@malamathi.org
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