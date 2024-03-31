
document.addEventListener('DOMContentLoaded', () => {
    const slideContainer = document.getElementById('slide');
    fetch('http://localhost:3000/api/data')
        .then(response => response.json())
        .then(data => {

                data.forEach(item => {
                    const slideItem = document.createElement('div');
                    slideItem.classList.add('item');
                    slideItem.style.backgroundImage = `url(${item.per_profile})`;
    
                    const content = document.createElement('div');
                    content.classList.add('content');
    
                    const name = document.createElement('div');
                    name.classList.add('name');
                    name.textContent = item.per_name;
    
                    const des = document.createElement('div');
                    des.classList.add('des');
                    des.textContent = item.per_des;
    
                    const button = document.createElement('button');
                    button.textContent = 'See More';
    
                    content.appendChild(name);
                    content.appendChild(des);
                    content.appendChild(button);
    
                    slideItem.appendChild(content);
                    slideContainer.appendChild(slideItem);
                });
            
            
            
        })
        .catch(error => console.error('Error fetching data:', error));
});
document.addEventListener('DOMContentLoaded', () => {
    const slideContainer = document.getElementById('slide');

   
    fetch('http://localhost:3000/api/data')
        .then(response => response.json())
        .then(data => {
            
            data.forEach(item => {
                const slideItem = document.createElement('div');
                slideItem.classList.add('item');
                slideItem.style.backgroundImage = `url(${item.per_profile})`;

                const content = document.createElement('div');
                content.classList.add('content');

                const name = document.createElement('div');
                name.classList.add('name');
                name.textContent = item.per_name;

                const des = document.createElement('div');
                des.classList.add('des');
                des.textContent = item.per_des;

                const button = document.createElement('button');
                button.textContent = 'See More';

                content.appendChild(name);
                content.appendChild(des);
                content.appendChild(button);

                slideItem.appendChild(content);
                slideContainer.appendChild(slideItem);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
