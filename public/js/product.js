

function showNotification(message, type = 'success') {
    const container = document.getElementById('notification-container');  
    // Create notification element
    const notification = document.createElement('div');

    let background = type === 'success' ? 'success' : type === 'error' ? 'error': 'pending-bg'
    notification.className = `w-full text-center transition-all duration-800 transform overflow-hidden bg-${background} text-secondary px-4 py-3 rounded-sm opacity-0 max-h-0`;
    notification.textContent = message;
    container.appendChild(notification);
    container.classList.add('my-2')
    notification.offsetHeight;

    notification.classList.remove('opacity-0', 'max-h-0');
    notification.classList.add('opacity-100', 'max-h-40'); 

    // Automatically hide notification after 3 seconds
    setTimeout(() => {
        notification.classList.remove('opacity-100', 'max-h-40');
        notification.classList.add('opacity-0', 'max-h-0');
        
        // Remove the notification after animation
        setTimeout(() => {
            notification.remove();
            container.classList.remove('my-2')
        }, 700); // This matches the transition duration
    }, 3000);
}

$(document).ready(()=>{
    $('.productForm').on('submit', function(e){
        e.preventDefault()
        var formData = $(this).serialize();
        const form = $(this)

        $.ajax({
            url: "/cart/add",
            method: 'POST',
            data: formData,
            success: function(response){
                showNotification('Product added to cart', 'success');       
                // Update cart count in header
                cart_length = Object.keys(response.cart).length
                $('#cart_indicator').html(cart_length)

                // change the background of the button
                form.find('button').addClass('bg-blue-400')
                setTimeout(() => {
                    form.find('button').removeClass('bg-sky-400')
                }, 3000);
            }
        })
    })
})