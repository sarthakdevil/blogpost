document.addEventListener("DOMContentLoaded", function () {
    displayPosts();
});

function savePost() {
    const title = document.getElementById("title").value;
    const content = document.getElementById("content").value;
    const imageUrl = document.getElementById("image").value;

    if (title && content) {
        const post = {
            title,
            content,
            imageUrl
        };

        let posts = JSON.parse(localStorage.getItem("posts")) || [];
        posts.push(post);
        localStorage.setItem("posts", JSON.stringify(posts));

        displayPosts();
        document.getElementById("blogForm").reset();
    }
}

// ... (previous code) ...

function displayPosts() {
    const blogTitleList = document.getElementById("blogTitleList");
    blogTitleList.innerHTML = "";

    const lowerBlogList = document.getElementById("lowerBlogList");
    lowerBlogList.innerHTML = "";

    const posts = JSON.parse(localStorage.getItem("posts")) || [];

    posts.forEach(function (post, index) {
        // Display only the blog titles in the upper div
        const titleDiv = document.createElement("div");
        titleDiv.className = "blog-title";
        titleDiv.innerHTML = `<h3 onclick="showFullBlog(${index})">${post.title}</h3>`;
        blogTitleList.appendChild(titleDiv);

        // Display the entire blog post in the lowerBlogList div
        const lowerPostDiv = document.createElement("div");
        lowerPostDiv.className = "post";
        lowerPostDiv.innerHTML = `
            <h3>${post.title}</h3>
            <p>${post.content}</p>
            ${post.imageUrl ? `<img src="${post.imageUrl}" alt="${post.title}">` : ''}
            <button onclick="updatePost(${index})">Update</button>
            <button onclick="deletePost(${index})">Delete</button>
        `;
        lowerBlogList.appendChild(lowerPostDiv);
    });
}

function showFullBlog(index) {
    const posts = JSON.parse(localStorage.getItem("posts")) || [];
    const post = posts[index];

    alert(`Full Blog Post:\n\nTitle: ${post.title}\nContent: ${post.content}\nImage URL: ${post.imageUrl || 'N/A'}`);
}

function updatePost(index) {
    const posts = JSON.parse(localStorage.getItem("posts")) || [];
    const post = posts[index];

    const updatedTitle = prompt("Enter updated title:", post.title);
    const updatedContent = prompt("Enter updated content:", post.content);
    const updatedImageUrl = prompt("Enter updated image URL (optional):", post.imageUrl);

    if (updatedTitle !== null && updatedContent !== null) {
        posts[index] = {
            title: updatedTitle,
            content: updatedContent,
            imageUrl: updatedImageUrl || ''
        };

        localStorage.setItem("posts", JSON.stringify(posts));
        displayPosts();
    }
}

function deletePost(index) {
    const confirmDelete = confirm("Are you sure you want to delete this post?");
    
    if (confirmDelete) {
        const posts = JSON.parse(localStorage.getItem("posts")) || [];
        posts.splice(index, 1);
        localStorage.setItem("posts", JSON.stringify(posts));
        displayPosts();
    }
}

// ... (remaining code) ...
