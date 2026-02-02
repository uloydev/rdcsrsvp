@extends('layouts.app')

@section('content')
    <div
        class="min-h-[100svh] max-h-screen min-w-screen relative bg-transparent max-w-lg mx-auto overflow-x-hidden overflow-y-auto">
        <div id="loadingBG" class="fixed z-30 top-0 h-[100svh] w-screen max-w-lg bg-running-red transition-all duration-700 ">
        </div>
        <div id="sliderContainer"
            class="fixed w-full max-w-lg h-full -z-10 top-0 left-0 lg:left-1/2 lg:-translate-x-1/2">
                <img src="/assets/img/bg-pattern.png" alt="form slide"
                    class="absolute top-0 left-0 h-full object-cover object-center opacity-0 transition-all duration-1000 w-full">
        </div>


        <div id="scrollContainer"
            class="snap-mandatory snap-y h-[100svh] max-h-[100svh] w-screen max-w-lg overflow-y-auto overflow-x-hidden scroll-smooth relative">
            <!-- <a id="backToTop" href="" class="fixed bottom-8 hover:botton-10 z-20 transition-all left-1/2 -translate-x-1/2">
                <img src="/assets/img/top.svg" alt="back to top" class="w-6 hover:w-8">

            </a> -->
            <!-- start of corner texture -->
            <div id="topRightCornerTexture" class="absolute  w-12 -z-10 transition-all duration-500 -top-20 -right-20">
                <img src="/assets/img/corner-texture.png" alt="corner texture"
                    class="w-full h-full object-cover object-top-right">
            </div>
            <!-- bottom left -->
            <div id="bottomLeftCornerTexture" class="absolute -bottom-20 -left-32 w-12 -z-10 transition-all duration-500">
                <img style="  transform: scaleY(-1) rotate(90deg);filter: FlipV;" src="/assets/img/corner-texture.png" alt="corner texture"
                    class="w-full h-full object-cover object-bottom-left">
            </div>
            <!-- end of corner texture -->

            <div id="main"
                class="flex flex-col relative min-h-[100svh] w-full text-white pt-20
                pb-20 font-spaceMono snap-start overflow-hidden">
                <!-- <div
                    class="absolute w-full min-h-[100svh] h-full max-h-screen max-w-lg -z-10 left-0 lg:left-1/2 lg:-translate-x-1/2 top-0 bg-running-red/70">
                </div> -->
                <div id="logoWrapper" class="absolute h-20 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full transition-all duration-500 z-50">
                    <div class="flex justify-center relative gap-x-4">
                        <img id="logo" src="/assets/img/logo.svg" alt="Logo DSL"
                        class="w-12 opacity-0 transition-all duration-500">
                        <img id="logo2" src="/assets/img/logo2.svg" alt="Unbox"
                        class="w-0 opacity-0 transition-all duration-1000 z-10">
                    </div>
                </div>
                <div id="headlineGroup"
                    class="flex-grow flex flex-col justify-evenly text-normal font-bold opacity-0 transition-all duration-1000">
                    <div class="justify-center flex items-center py-4">
                        <img src="/assets/img/flag-off.svg" alt="kick off" class="w-[70%] px-4">
                        <!-- <p>You Are Invited to</p>
                        <p class="-mt-2">The Unbox Day</p>
                        <div class="-mt-3">
                            <span class="inline-block text-sm bg-running-red px-2 py-1"><span class="font-normal">Grand
                                    Opening of</span> Department
                                Sports Lab</span>
                        </div> -->
                    </div>
                    <div class="text-center px-2 flex flex-col gap-y-4">
                        <p class=" text-lg font-extrabold">You're Officially Invited to FLAG-OFF DAY!</p>
                        <p class="font-normal text-sm px-4">Running Dept Proudly Presents the grand opening of Our First Concept Store, a home full of experience built for runners, communities, and podium chaser. It's time to step into your running home.</p>
                    </div>
                </div>
                <div id="registerBtnGroup" class="transition-all duration-1000 opacity-0">
                    
                    <div class="flex gap-x-6 px-8">

                        <a id="goToForm"
                            class="text-lg text-center bg-transparent border border-white backdrop-blur-sm py-4  hover:font-bold transition-all w-full text-white cursor-pointer">CLICK HERE TO REGISTER</a>
                    </div>
                </div>
                <p id="copyrightText" class="z-10 fixed bottom-0 left-1/2 -translate-x-1/2 pt-20 pb-2 text-center text-xs transition-colors duration-300">RUNNING-DEPT &copy;2026</p>
            </div>

            <div id="maps"
                class="h-[100svh] w-full snap-start flex flex-col items-center relative font-inter text-white text-center bg-running-red overflow-y-hidden">
                <img src="/assets/img/maps.png" alt="maps" class="h-full absolute object-fill">
                <img id="mapCaution" src="/assets/img/map-caution.png" alt="map caution" class="absolute bottom-20 left-1/2 -translate-x-1/2 w-[90%] bg-white/10 backdrop-blur-sm opacity-0 transition-all duration-700 delay-700">
                <!-- <div class="flex-grow h-full flex items-center">
                    <div id="mapsImg" class="overflow-hidden transition-all duration-1000 h-full">
                    </div>caution
                </div> -->
            </div>

            <div id="timeline"
                style="background: url('/assets/img/pattern-2.png'); background-size: cover; background-position: center;"
                class="min-h-[100svh] w-full snap-start flex flex-col items-center justify-evenly relative font-spaceMono text-white text-center overflow-hidden px-6">
                    <h1 id="timelineTitle" class="text-6xl font-bold opacity-0 transition-all duration-700">RUNDOWN</h1>
                    <img id="timelineRundown" src="/assets/img/rundown.png" alt="timeline" class="w-full object-center opacity-0 transition-all duration-700">
                    <img id="timelineLogos" src="/assets/img/logo-group.svg" alt="logo group timeline" class="w-1/2 opacity-0 transition-all duration-700">

            </div>

            <form id="rsvpForm" method="POST" action="/participant/register"
                class="relative min-h-[100svh] w-full transition-all duration-1000 snap-start overflow-hidden font-spaceMono uppercase">
                <div class="absolute top-0 left-0 min-h-[100svh] h-full max-h-screen w-full -z-10 bg-white"></div>
                <!-- start of corner texture for form -->
                <div id="formTopRightCornerTexture" class="absolute w-12 transition-all duration-500 delay-500 -top-20 -right-20">
                    <img src="/assets/img/corner-texture-red.png" alt="corner texture"
                        class="w-full h-full object-cover object-top-right">
                </div>
                <!-- bottom left -->
                <div id="formBottomLeftCornerTexture" class="absolute -bottom-20 -left-32 w-12 transition-all duration-500 delay-500">
                    <img style="transform: scaleY(-1) rotate(90deg);filter: FlipV;" src="/assets/img/corner-texture-red.png" alt="corner texture"
                        class="w-full h-full object-cover object-bottom-left">
                </div>
                <!-- end of corner texture for form -->
                @csrf()
                @method('POST')
                <div class="absolute w-full h-full z-10 px-8 flex flex-col justify-between pb-6">
                    <div class="flex justify-center py-8 ">
                        <img src="/assets/img/flag-off-red.svg" alt="kick off" class="w-full px-12">
                        <!-- <p class="text-right text-running-red font-bold text-3xl">The Kick Off Day</p> -->
                    </div>
                    <div class="flex-grow overflow-y-auto overflow-x-hidden">
                        <div class="relative flex flex-col gap-y-4 items-center py-8">
                            <div class="flex-grow w-full flex flex-col gap-y-4 px-2">
                                <input type="text" name="name" placeholder="ENTER YOUR FULL NAME"
                                    class="block w-full py-3 transition-all bg-white border focus:border-2 border-running-red/70 focus:border-running-red text-running-red placeholder-running-red text-center focus:placeholder-transparent" />
                                <input type="email" name="email" placeholder="ENTER YOUR EMAIL"
                                    class="block w-full py-3 transition-all bg-white border focus:border-2 border-running-red/70 focus:border-running-red text-running-red placeholder-running-red text-center focus:placeholder-transparent" />
                                <input type="text" name="phone" placeholder="ENTER YOUR PHONE NUMBER"
                                    class="block w-full py-3 transition-all bg-white border focus:border-2 border-running-red/70 focus:border-running-red text-running-red placeholder-running-red text-center focus:placeholder-transparent" />
                                <button type="button" id="categoryBtn"
                                    class="block w-full py-3 transition-all bg-white border hover:border-2 border-running-red/70 hover:border-white text-running-red text-center">CATEGORY</button>
                                <div id="categoryList"
                                    class="text-running-red px-4 bg-white rounded-3xl border-running-red/70 text-center h-0 overflow-hidden transition-all duration-500">
                                    <div class="border-b border-running-red/70 py-4">
                                        <label for="categoryCompany">COMPANY</label>
                                        <input class="hidden" type="radio" name="category" id="categoryCompany"
                                            value="Company" />
                                    </div>
                                    <div class="border-b border-running-red/70 py-4">
                                        <label for="categoryKOL">KOL</label>
                                        <input class="hidden" type="radio" name="category" id="categoryKOL"
                                            value="KOL" />
                                    </div>
                                    <div class="border-b border-running-red/70 py-4">
                                        <label for="categoryFamily">FAMILY AND FRIENDS</label>
                                        <input class="hidden" type="radio" name="category" id="categoryFamily"
                                            value="Family and Friend" />
                                    </div>
                                    <div class="border-b border-running-red/70 py-4">
                                        <label for="categoryPartner">PARTNER</label>
                                        <input class="hidden" type="radio" name="category" id="categoryPartner"
                                            value="Partner" />
                                    </div>
                                    <div class="pt-4">
                                        <label for="categoryOthers">OTHERS</label>
                                        <input class="hidden" type="radio" name="category" id="categoryOthers"
                                            value="Others" />
                                    </div>
                                </div>
                                <label for="additional_participant" class="text-running-red border-running-red border-t-4 pt-4 mx-4 text-center">ADDITIONAL</label>
                                <div class="relative">
                                    <button id="plusBtn" class="absolute top-1/2 -translate-y-1/2 right-4 w-8 h-8 bg-running-red font-bold text-white text-center">+</button>
                                    <button id="minBtn" class="absolute top-1/2 -translate-y-1/2 left-4 w-8 h-8 bg-running-red font-bold text-white text-center">-</button>
                                    <input type="number" name="additional_participant"
                                    class="block w-full py-3 transition-all bg-white border focus:border-2 border-running-red/70 focus:border-running-red text-running-red placeholder-running-red text-center focus:placeholder-transparent" value="0" max="2" />
                                </div>
                                <button id="submitBtn" type="button"
                                    class=" block w-full py-4 bg-running-red text-white transition-all mt-8 mb-10 text-xl">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const logoWrapper = document.getElementById("logoWrapper");
        const logo = document.getElementById("logo");
        const logo2 = document.getElementById("logo2");
        const loadingBG = document.getElementById("loadingBG");
        const headlineGroup = document.getElementById("headlineGroup");
        const registerBtnGroup = document.getElementById("registerBtnGroup");
        const rsvpForm = document.getElementById("rsvpForm");
        const formSlider = document.querySelectorAll("#sliderContainer img");
        const categoryBtn = document.getElementById("categoryBtn");
        const submitBtn = document.getElementById("submitBtn");
        const categoryList = document.getElementById("categoryList");
        const scrollContainer = document.getElementById("scrollContainer");
        // const goToMainBtn = document.getElementById("backToTop")
        const goToFormBtn = document.getElementById("goToForm")
        const timeline = document.getElementById("timeline");
        const timelineImg = document.getElementById("timelineImg");
        const maps = document.getElementById("maps");
        const plusBtn = document.getElementById("plusBtn");
        const minBtn = document.getElementById("minBtn");
        const additionalParticipantInput = rsvpForm.querySelector('input[name="additional_participant"]');
        const topRightCornerTexture = document.getElementById("topRightCornerTexture");
        const bottomLeftCornerTexture = document.getElementById("bottomLeftCornerTexture");
        const copyrightText = document.getElementById("copyrightText");
        const formTopRightCornerTexture = document.getElementById("formTopRightCornerTexture");
        const formBottomLeftCornerTexture = document.getElementById("formBottomLeftCornerTexture");
        const timelineTitle = document.getElementById("timelineTitle");
        const timelineRundown = document.getElementById("timelineRundown");
        const timelineLogos = document.getElementById("timelineLogos");
        const mapCaution = document.getElementById("mapCaution");
        let timelineRevealed = false;
        let mapsRevealed = false;

        // Change copyright text color and reveal form corner textures based on rsvpForm visibility
        scrollContainer.addEventListener("scroll", () => {
            const rect = rsvpForm.getBoundingClientRect();
            const isFormVisible = rect.top < window.innerHeight && rect.bottom > 0;
            
            if (isFormVisible) {
                copyrightText.classList.remove("text-white");
                copyrightText.classList.add("text-running-red");
                
                // Reveal form corner textures
                formTopRightCornerTexture.classList.remove("-top-20");
                formTopRightCornerTexture.classList.remove("-right-20");
                formTopRightCornerTexture.classList.add("top-0");
                formTopRightCornerTexture.classList.add("right-0");
                
                formBottomLeftCornerTexture.classList.remove("-bottom-20");
                formBottomLeftCornerTexture.classList.remove("-left-32");
                formBottomLeftCornerTexture.classList.add("-bottom-4");
                formBottomLeftCornerTexture.classList.add("left-0");
            } else {
                copyrightText.classList.remove("text-running-red");
                copyrightText.classList.add("text-white");
                
                // Hide form corner textures
                formTopRightCornerTexture.classList.add("-top-20");
                formTopRightCornerTexture.classList.add("-right-20");
                formTopRightCornerTexture.classList.remove("top-0");
                formTopRightCornerTexture.classList.remove("right-0");
                
                formBottomLeftCornerTexture.classList.add("-bottom-20");
                formBottomLeftCornerTexture.classList.add("-left-32");
                formBottomLeftCornerTexture.classList.remove("-bottom-4");
                formBottomLeftCornerTexture.classList.remove("left-0");
            }

            // Reveal timeline items one by one
            const timelineRect = timeline.getBoundingClientRect();
            const isTimelineVisible = timelineRect.top < window.innerHeight && timelineRect.bottom > 0;
            
            if (isTimelineVisible && !timelineRevealed) {
                timelineRevealed = true;
                setTimeout(() => {
                    timelineTitle.classList.remove("opacity-0");
                }, 200);
                setTimeout(() => {
                    timelineRundown.classList.remove("opacity-0");
                }, 500);
                setTimeout(() => {
                    timelineLogos.classList.remove("opacity-0");
                }, 800);
            }

            // Reveal map items one by one
            const mapsRect = maps.getBoundingClientRect();
            const isMapsVisible = mapsRect.top < window.innerHeight && mapsRect.bottom > 0;
            
            if (isMapsVisible && !mapsRevealed) {
                mapsRevealed = true;
                setTimeout(() => {
                    mapCaution.classList.remove("opacity-0");
                }, 500);
            }
        });

        plusBtn.addEventListener("click", (e) => {
            e.preventDefault();
            let currentValue = parseInt(additionalParticipantInput.value) || 0;
            if (currentValue < 2) {
                additionalParticipantInput.value = currentValue + 1;
            }
        })

        minBtn.addEventListener("click", (e) => {
            e.preventDefault();
            let currentValue = parseInt(additionalParticipantInput.value) || 0;
            if (currentValue > 0) {
                additionalParticipantInput.value = currentValue - 1;
            }
        })

        maps.addEventListener("click",(e) => {
            e.preventDefault();
            window.open("https://maps.app.goo.gl/mjoX3hEHbbRryWGg6?g_st=ic", "_blank");
        })

        const popup = Swal.mixin({
            customClass: {
                confirmButton: "block w-full rounded-full",
                popup: "rounded-[2rem]",
                image: "w-32 mx-auto pt-8"
            }
        })

        let initialAlert = {!! session('alert') ? json_encode(session('alert')) : 'null' !!};
        if (initialAlert) {
            popup.fire(initialAlert);
        }


        const formSliderLen = formSlider.length;
        let formSliderIndex = 0;

        setTimeout(() => {
            window.scrollTo(0, 0)
            logo.classList.add("opacity-100");
            setTimeout(() => {
                logo2.classList.remove("opacity-0")
                logo2.classList.add("!w-24")
            }, 1000);
            setTimeout(() => {
                logoWrapper.classList.replace("top-1/2", "top-24");
                setTimeout(() => {
                    loadingBG.classList.add("opacity-0");
                }, 500);
                setTimeout(() => {
                    registerBtnGroup.classList.remove("opacity-0");
                    headlineGroup.classList.remove("opacity-0");
                    loadingBG.remove();
                    setTimeout(() => {
                        topRightCornerTexture.classList.replace("-top-20", "top-0");
                        topRightCornerTexture.classList.replace("-right-20", "right-0");
                        bottomLeftCornerTexture.classList.replace("-bottom-20", "-bottom-4");
                        bottomLeftCornerTexture.classList.replace("-left-32", "left-0");
                    }, 500);
                }, 1000);
            }, 2000);
        }, 1000);

        formSlider[formSliderIndex].classList.remove("opacity-0")
        // setInterval(() => {
        //     formSlider[formSliderIndex].classList.toggle("opacity-0")
        //     formSliderIndex = (formSliderIndex + 1) % formSliderLen;
        //     formSlider[formSliderIndex].classList.toggle("opacity-0")
        // }, 3000);

        const onSelectCategory = (e) => {
            categoryBtn.innerText = e.target.innerText;
            toggleCategoryList()
        }

        const toggleCategoryList = () => {
            categoryList.classList.toggle("border")
            categoryList.classList.toggle("h-0")
        }

        function isElementInViewport(el) {
            var rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                /* or $(window).height() */
                rect.right <= (window.innerWidth || document.documentElement.clientWidth) /* or $(window).width() */
            );
        }


        const token = document.querySelector('input[name="_token"]').value;

        // const timelineInterval = setInterval(() => {
        //     console.log("interval");
        //     if (isElementInViewport(timeline) && timelineImg.classList.contains("opacity-0")) {
        //         console.log("masuk");
        //         timelineImg.classList.remove("opacity-0");
        //         setTimeout(() => {
        //             console.log("timeout");
        //             clearInterval(timelineInterval);
        //         }, 1000)
        //     }
        // }, 100)

        goToFormBtn.addEventListener("click", (e) => {
            e.preventDefault();
            scrollContainer.classList.toggle("snap-mandatory")
            scrollContainer.classList.toggle("snap-y")
            window.location.href = "#rsvpForm"
            scrollContainer.classList.toggle("snap-mandatory")
            scrollContainer.classList.toggle("snap-y")
        })

        // goToMainBtn.addEventListener("click", (e) => {
        //     e.preventDefault();
        //     scrollContainer.classList.toggle("snap-mandatory")
        //     scrollContainer.classList.toggle("snap-y")
        //     window.location.href = "#main"
        //     scrollContainer.classList.toggle("snap-mandatory")
        //     scrollContainer.classList.toggle("snap-y")
        // })

        submitBtn.addEventListener("click", () => {
            submitBtn.disabled = true;
            submitBtn.classList.add("opacity-50");
            const formData = new FormData(rsvpForm);
            if (!formData.has("category")) {
                formData.set("category", null)
            }
            fetch("/participant/register", {
                body: formData,
                headers: {
                    "Accept": "application/json",
                },
                method: "post",
            }).then((res) => {
                if (res.ok) {
                    popup.fire({
                        title: `<span class="font-inter font-bold text-[#040404]">Thank you!</span>`,
                        html: `<div class="text-sm -mt-4"><p class="font-inter">Check your email for your <b>RSVP Number</b></p><p class="font-inter">Your submission is valid for 1 person only.</p><p class="font-inter">Just show up because you better RUN!</p></div>`,
                        imageUrl: "/assets/icon/check.svg",
                        confirmButtonText: `<span class="font-inter">Close</span>`
                    });
                    rsvpForm.reset();
                    categoryBtn.innerText = "Category";
                    return null
                } else {
                    return res.json()
                }
            }).then((data) => {
                if (data) {
                    popup.fire({
                        title: '<span class="font-inter font-bold text-[#040404]">Oops!</span>',
                        html: `<ul class="text-left text-red-500 list-disc p-4 flex flex-col gap-y-2 text-lg rounded-lg bg-red-200">
                            ${Object.keys(data.errors).map(key => '<li class="mx-4">'+data.errors[key].join(',')+'</li>').join('')}
                        </ul>`,
                        icon: 'error',
                        confirmButtonText: `<span class="font-inter">Close</span>`
                    });
                }
            }).finally(() => {
                submitBtn.disabled = false;
                submitBtn.classList.remove("opacity-50");
            })
        })

        categoryBtn.addEventListener("click", toggleCategoryList);

        categoryList.querySelectorAll("label").forEach((item) => {
            item.addEventListener("click", onSelectCategory);
        })
    </script>
@endpush
