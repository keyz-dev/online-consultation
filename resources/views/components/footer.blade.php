<style>
    footer div section div ul li a{
        transition: all 0.2s ease-in-out;

        &:hover{
            text-decoration: underline;
        }
    }

</style>

<footer class="w-screen bg-footer opacity-95  py-3">
    <div class="container footer flex flex-col py-4 pt-5 md:px-0 gap-5 h-full">
        
        <section class="grid container grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 ">
            <div>
                <x-logo :logo="$logo" />
                <p class="text-[11px] text-secondary">Book appointments at super-human speed and get consulted at the confort of your home</p>
            </div>

            <div>
                <h3 class="text-md text-primary font-bold">SERVICES</h3>
                <hr class="border border-accent my-4 w-[70%]">
                <ul class="text-sm text-secondary flex flex-col gap-3">
                    <li><a href="#">Book appointments</a></li>
                    <li><a href="#">Consultation</a></li>
                    <li><a href="#">Schedule a visit</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-md text-primary font-bold">PAGES</h3>
                <hr class="border border-accent my-4 w-[70%]">
                <ul class="text-sm text-secondary flex flex-col gap-3">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Specialties</a></li>
                    <li><a href="#">Doctors</a></li>
                   
                </ul>
            </div>
            <div>
                <h3 class="text-md text-primary font-bold">MORE</h3>
                <hr class="border border-accent my-4 w-[70%]">
                <ul class="text-sm text-secondary flex flex-col gap-3">
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="{{route('user.login')}}">Login</a></li>
                    <li><a href="{{route('user.register')}}">SignUp</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-md text-primary font-bold">CONTACT</h3>
                <hr class="border border-accent my-4 w-[70%]">
                <ul class="text-sm text-secondary flex flex-col gap-3">
                    <li class="flex gap-2">
                        <img  src="https://img.icons8.com/fluency/28/google-maps-new.png" alt="google-maps-new"/>
                        <span class="ml-2">P.O BOX 2715, Yaounde, Cameroon</span>
                    </li>
                    <li class="flex gap-2">
                        <img width="28" height="28" src="https://img.icons8.com/color/28/gmail-new.png" alt="gmail-new"/>
                        <span class="ml-2">keyzglobal0313@gmail.com</span>
                    </li>
                    <li class="flex gap-2">
                        <img width="28" height="28" src="https://img.icons8.com/color/28/phone.png" alt="phone"/>
                        <span class="ml-2">(+237) Admin Number</span>
                    </li>
                </ul>
            </div>
        </section>

        <hr class="border border-gray-300">
        <section class="flex flex-col sm:flex-row items-start sm:items-center text-gray-400 text-sm justify-between gap-2 sm:gap-auto">
            <p>&copy; 2022 My Website. All rights reserved.</p>
            <div class="flex gap-3 items-center">
                <a href="https://www.facebook.com/profile.php?id=100089952266984" target="_blank" title="facebook">
                    <img width="30" height="30" src="https://img.icons8.com/fluency/30/facebook-new.png" alt="facebook-new"/>
                </a>
                <a href="https://www.facebook.com/profile.php?id=100089952266984" target="_blank" title="instagram">
                    <img width="30" height="30" src="https://img.icons8.com/fluency/30/instagram-new.png" alt="instagram-new"/>
                </a>
                <a href="https://www.facebook.com/profile.php?id=100089952266984" target="_blank" title="linkedin">
                    <img width="30" height="30" src="https://img.icons8.com/fluency/30/linkedin.png" alt="linkedin"/>
                </a>
                <a href="https://www.facebook.com/profile.php?id=100089952266984" target="_blank" title="X">
                    <img width="30" height="30" src="https://img.icons8.com/fluency/30/twitterx--v1.png" alt="twitterx--v1"/>
                </a>
                <a href="https://wa.me/237655955186?text=I'm%20interested%20in%20your%20online%20consultation%20service" target="_blank" title="whatsapp">
                    <img width="30" height="30" src="https://img.icons8.com/color/30/whatsapp--v1.png" alt="whatsapp--v1"/>
                </a>
            </div>
            <p>Powered by <a href="https://www.google.com/">Google</a></p>
        </section>
    </div>
</footer>