document.addEventListener('DOMContentLoaded', () => {
    const slideContainer = document.getElementById('slide');
    
    // Function to fetch data from the API
    const fetchData = () => {
        return fetch('http://localhost:3000/api/data')
            .then(response => response.json())
            .catch(error => console.error('Error fetching data:', error));
    };

    // Function to create slide items
    const createSlideItem = (item) => {
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
        // Add event listener to the "See More" button
        button.addEventListener('click', () => {
            // Redirect to another page and pass per_id as a parameter
            window.location.href = `page/users/perfomaance/userper.php?per_id=${item.per_id}`;
        });

        content.appendChild(name);
        content.appendChild(des);
        content.appendChild(button);

        slideItem.appendChild(content);
        slideContainer.appendChild(slideItem);
    };

    // Fetch data and create slide items
    fetchData().then(data => {
        data.forEach(item => {
            createSlideItem(item);
        });
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const slideContainer = document.getElementById('slide');
    
    // Function to fetch data from the API
    const fetchData = () => {
        return fetch('http://localhost:3000/api/data')
            .then(response => response.json())
            .catch(error => console.error('Error fetching data:', error));
    };

    // Function to create slide items
    const createSlideItem = (item) => {
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
        // Add event listener to the "See More" button
        button.addEventListener('click', () => {
            // Redirect to another page and pass per_id as a parameter
            window.location.href = `page/users/perfomaance/userper.php?per_id=${item.per_id}`;
        });

        content.appendChild(name);
        content.appendChild(des);
        content.appendChild(button);

        slideItem.appendChild(content);
        slideContainer.appendChild(slideItem);
    };

    // Fetch data and create slide items
    fetchData().then(data => {
        data.forEach(item => {
            createSlideItem(item);
        });
    });
});

// document.addEventListener('DOMContentLoaded', () => {
//     const slideContainer = document.getElementById('slide');
    
//     fetch('http://localhost:3000/api/data')
//         .then(response => response.json())
//         .then(data => {
//             data.forEach(item => {
//                 const slideItem = document.createElement('div');
//                 slideItem.classList.add('item');
//                 slideItem.style.backgroundImage = `url(${item.per_profile})`;

//                 const content = document.createElement('div');
//                 content.classList.add('content');

//                 const name = document.createElement('div');
//                 name.classList.add('name');
//                 name.textContent = item.per_name;

//                 const des = document.createElement('div');
//                 des.classList.add('des');
//                 des.textContent = item.per_des;

//                 const button = document.createElement('button');
//                 button.textContent = 'See More';

//                 content.appendChild(name);
//                 content.appendChild(des);
//                 content.appendChild(button);

//                 slideItem.appendChild(content);
//                 slideContainer.appendChild(slideItem);
//             });
//         })
//         .catch(error => console.error('Error fetching data:', error));
// });

// document.addEventListener('DOMContentLoaded', () => {
//     const slideContainer = document.getElementById('slide');
    
//     fetch('http://localhost:3000/api/data')
//         .then(response => response.json())
//         .then(data => {
//             data.forEach(item => {
//                 const slideItem = document.createElement('div');
//                 slideItem.classList.add('item');
//                 slideItem.style.backgroundImage = `url(${item.per_profile})`;

//                 const content = document.createElement('div');
//                 content.classList.add('content');

//                 const name = document.createElement('div');
//                 name.classList.add('name');
//                 name.textContent = item.per_name;

//                 const des = document.createElement('div');
//                 des.classList.add('des');
//                 des.textContent = item.per_des;

//                 const button = document.createElement('button');
//                 button.textContent = 'See More';

//                 content.appendChild(name);
//                 content.appendChild(des);
//                 content.appendChild(button);

//                 slideItem.appendChild(content);
//                 slideContainer.appendChild(slideItem);
//             });
//         })
//         .catch(error => console.error('Error fetching data:', error));
// });
