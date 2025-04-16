// Wait for DOM to load
document.addEventListener('DOMContentLoaded', function() {
    // Function to handle responsive behavior if needed
    function handleResponsive() {
        // This function can be used to implement any dynamic behavior
        // that needs to be adjusted based on screen size
        
        // Adjust the position of the edit profile button on smaller screens
        const editBtn = document.querySelector('.edit-profile-btn');
        if (editBtn) {
            if (window.innerWidth < 768) {
                editBtn.style.position = 'relative';
                editBtn.style.top = 'auto';
                editBtn.style.right = 'auto';
                editBtn.style.marginTop = '10px';
            } else {
                editBtn.style.position = 'absolute';
                editBtn.style.top = '20px';
                editBtn.style.right = '20px';
                editBtn.style.marginTop = '0';
            }
        }
    }

    // Initialize any interactive elements
    function initInteractiveElements() {
        // Handle form validation
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                let hasError = false;
                
                // Simple validation for required fields
                const requiredInputs = form.querySelectorAll('[required]');
                requiredInputs.forEach(input => {
                    if (!input.value.trim()) {
                        e.preventDefault();
                        hasError = true;
                        
                        // Add error styling
                        input.style.borderColor = '#cc0000';
                        
                        // Find or create error message
                        let errorSpan = input.nextElementSibling;
                        if (!errorSpan || !errorSpan.style || errorSpan.style.color !== 'rgb(204, 0, 0)') {
                            errorSpan = document.createElement('span');
                            errorSpan.style.color = '#cc0000';
                            errorSpan.style.fontSize = '12px';
                            input.parentNode.insertBefore(errorSpan, input.nextSibling);
                        }
                        errorSpan.textContent = `${input.getAttribute('placeholder') || 'This field'} is required`;
                    }
                });
                
                // Email validation
                const emailInput = form.querySelector('[type="email"]');
                if (emailInput && emailInput.value.trim() && !validateEmail(emailInput.value.trim())) {
                    e.preventDefault();
                    hasError = true;
                    
                    // Add error styling
                    emailInput.style.borderColor = '#cc0000';
                    
                    // Find or create error message
                    let errorSpan = emailInput.nextElementSibling;
                    if (!errorSpan || !errorSpan.style || errorSpan.style.color !== 'rgb(204, 0, 0)') {
                        errorSpan = document.createElement('span');
                        errorSpan.style.color = '#cc0000';
                        errorSpan.style.fontSize = '12px';
                        emailInput.parentNode.insertBefore(errorSpan, emailInput.nextSibling);
                    }
                    errorSpan.textContent = 'Please enter a valid email address';
                }
                
                // If form has errors, scroll to the first error
                if (hasError) {
                    const firstErrorInput = form.querySelector('[style*="border-color: #cc0000"]');
                    if (firstErrorInput) {
                        firstErrorInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });
            
            // Clear error styling on input
            const inputs = form.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    this.style.borderColor = '';
                    const errorSpan = this.nextElementSibling;
                    if (errorSpan && errorSpan.style && errorSpan.style.color === 'rgb(204, 0, 0)') {
                        errorSpan.textContent = '';
                    }
                });
            });
        }
        
        // Add smooth scrolling for success message
        const successMessage = document.querySelector('.info-card[style*="background-color: #e8f5e9"]');
        if (successMessage) {
            // Scroll to success message
            successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
            
            // Auto-hide success message after 5 seconds
            setTimeout(() => {
                successMessage.style.transition = 'opacity 1s ease-out';
                successMessage.style.opacity = '0';
                
                // Remove element after fade out
                setTimeout(() => {
                    successMessage.remove();
                }, 1000);
            }, 5000);
        }
    }
    
    // Helper function to validate email
    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    // Call initial setup functions
    handleResponsive();
    initInteractiveElements();

    // Add window resize listener for responsive adjustments
    window.addEventListener('resize', handleResponsive);
});