// Form validation for the registration page
document.addEventListener("DOMContentLoaded", function () {
    // Form validation
    const form = document.querySelector("form");
    const feedback = document.querySelector(".feedback");  // Feedback container
    
    if (form) {
        // Handle form submission
        form.addEventListener("submit", function (e) {
            // Get form fields
            const name = document.getElementById("name")?.value;
            const email = document.getElementById("email")?.value;
            const password = document.getElementById("password")?.value;
            const confirmPassword = document.getElementById("confirm_password")?.value;

            // Reset previous feedback
            if (feedback) feedback.innerHTML = "";
            
            // Validation checks
            if (!name || !email || !password || !confirmPassword) {
                e.preventDefault();  // Prevent form submission
                if (feedback) feedback.innerHTML = "<p class='text-red-600'>All fields are required.</p>";
                return false;
            }

            if (password !== confirmPassword) {
                e.preventDefault();
                if (feedback) feedback.innerHTML = "<p class='text-red-600'>Passwords do not match.</p>";
                return false;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                if (feedback) feedback.innerHTML = "<p class='text-red-600'>Please enter a valid email address.</p>";
                return false;
            }
            
            // Password strength check
            if (password.length < 8) {
                e.preventDefault();
                if (feedback) feedback.innerHTML = "<p class='text-red-600'>Password must be at least 8 characters long.</p>";
                return false;
            }
        });

        // Dynamic form field validation
        const passwordInput = document.getElementById("password");
        const confirmPasswordInput = document.getElementById("confirm_password");

        if (confirmPasswordInput && passwordInput) {
            confirmPasswordInput.addEventListener("input", function () {
                if (passwordInput.value !== confirmPasswordInput.value) {
                    confirmPasswordInput.classList.add("border-red-500");
                    confirmPasswordInput.classList.remove("border-green-500");
                } else {
                    confirmPasswordInput.classList.add("border-green-500");
                    confirmPasswordInput.classList.remove("border-red-500");
                }
            });
        }
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            
            const targetId = this.getAttribute("href");
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            }
        });
    });
    
    // Mobile menu toggle
    const menuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // BMI Calculator
    const bmiForm = document.getElementById('bmi-calculator');
    if (bmiForm) {
        bmiForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value) / 100; // Convert cm to meters
            
            if (weight && height) {
                const bmi = weight / (height * height);
                const result = document.getElementById('bmi-result');
                
                let category = '';
                if (bmi < 18.5) {
                    category = 'Underweight';
                } else if (bmi >= 18.5 && bmi < 25) {
                    category = 'Normal weight';
                } else if (bmi >= 25 && bmi < 30) {
                    category = 'Overweight';
                } else {
                    category = 'Obesity';
                }
                
                result.innerHTML = `
                    <div class="p-4 bg-gray-100 border rounded-md mt-4">
                        <p class="font-bold">Your BMI: ${bmi.toFixed(2)}</p>
                        <p>Category: ${category}</p>
                    </div>
                `;
            }
        });
    }
    
    // Class schedule tabs
    const tabs = document.querySelectorAll('[data-tab-target]');
    const tabContents = document.querySelectorAll('[data-tab-content]');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = document.querySelector(tab.dataset.tabTarget);
            
            tabContents.forEach(content => {
                content.classList.remove('active');
                content.classList.add('hidden');
            });
            
            tabs.forEach(t => {
                t.classList.remove('active', 'bg-orange-500', 'text-white');
                t.classList.add('bg-gray-200', 'text-gray-800');
            });
            
            if (target) {
                target.classList.add('active');
                target.classList.remove('hidden');
                tab.classList.add('active', 'bg-orange-500', 'text-white');
                tab.classList.remove('bg-gray-200', 'text-gray-800');
            }
        });
    });
    
    // Testimonial slider
    const testimonials = document.querySelectorAll('.testimonial-card');
    let currentTestimonial = 0;
    
    function showTestimonial(index) {
        testimonials.forEach((testimonial, i) => {
            testimonial.style.display = i === index ? 'block' : 'none';
        });
    }
    
    if (testimonials.length > 0) {
        // Initialize slider
        showTestimonial(currentTestimonial);
        
        // Next button
        const nextButton = document.querySelector('.testimonial-next');
        if (nextButton) {
            nextButton.addEventListener('click', () => {
                currentTestimonial = (currentTestimonial + 1) % testimonials.length;
                showTestimonial(currentTestimonial);
            });
        }
        
        // Previous button
        const prevButton = document.querySelector('.testimonial-prev');
        if (prevButton) {
            prevButton.addEventListener('click', () => {
                currentTestimonial = (currentTestimonial - 1 + testimonials.length) % testimonials.length;
                showTestimonial(currentTestimonial);
            });
        }
        
        // Auto-advance every 5 seconds
        setInterval(() => {
            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
            showTestimonial(currentTestimonial);
        }, 5000);
    }
    
    // Countdown timer for promotions
    const countdownElement = document.getElementById('promotion-countdown');
    if (countdownElement) {
        // Set the promotion end date (adjust as needed)
        const endDate = new Date();
        endDate.setDate(endDate.getDate() + 7); // 7 days from now
        
        function updateCountdown() {
            const now = new Date();
            const timeDifference = endDate - now;
            
            if (timeDifference <= 0) {
                countdownElement.innerHTML = "Promotion has ended!";
                return;
            }
            
            const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);
            
            countdownElement.innerHTML = `
                <div class="grid grid-cols-4 gap-2 text-center">
                    <div class="bg-gray-800 text-white p-2 rounded">
                        <span class="text-2xl font-bold">${days}</span>
                        <span class="text-xs block">Days</span>
                    </div>
                    <div class="bg-gray-800 text-white p-2 rounded">
                        <span class="text-2xl font-bold">${hours}</span>
                        <span class="text-xs block">Hours</span>
                    </div>
                    <div class="bg-gray-800 text-white p-2 rounded">
                        <span class="text-2xl font-bold">${minutes}</span>
                        <span class="text-xs block">Mins</span>
                    </div>
                    <div class="bg-gray-800 text-white p-2 rounded">
                        <span class="text-2xl font-bold">${seconds}</span>
                        <span class="text-xs block">Secs</span>
                    </div>
                </div>
            `;
        }
        
        // Update countdown every second
        updateCountdown();
        setInterval(updateCountdown, 1000);
    }
    
    // Workout progress tracker
    const progressForm = document.getElementById('progress-tracker');
    if (progressForm) {
        progressForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const exercise = document.getElementById('exercise').value;
            const sets = document.getElementById('sets').value;
            const reps = document.getElementById('reps').value;
            const weight = document.getElementById('weight').value;
            
            if (exercise && sets && reps) {
                const progressList = document.getElementById('progress-list');
                const now = new Date();
                const dateString = `${now.getDate()}/${now.getMonth() + 1}/${now.getFullYear()}`;
                
                const newEntry = document.createElement('div');
                newEntry.className = 'bg-white p-3 rounded shadow mb-3';
                newEntry.innerHTML = `
                    <div class="flex justify-between">
                        <div>
                            <h4 class="font-bold">${exercise}</h4>
                            <p>${sets} sets x ${reps} reps ${weight ? '@ ' + weight + ' kg' : ''}</p>
                        </div>
                        <div class="text-gray-500 text-sm">${dateString}</div>
                    </div>
                `;
                
                progressList.prepend(newEntry);
                progressForm.reset();
            }
        });
    }
});