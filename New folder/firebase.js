import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.0/firebase-app.js";
const firebaseConfig = {
    apiKey: "AIzaSyDrNK5wYAxMFbORDSajjIFhLLkgbbxuTc8",
    authDomain: "blogging-website-5cb52.firebaseapp.com",
    databaseURL: "https://blogging-website-5cb52-default-rtdb.firebaseio.com",
    projectId: "blogging-website-5cb52",
    storageBucket: "blogging-website-5cb52.appspot.com",
    messagingSenderId: "800646600294",
    appId: "1:800646600294:web:1dedbf5b20e45b9952bfa7",
    measurementId: "G-WXM6HS3TRF"
  };
  firebase.initializeApp(firebaseConfig);
  const blogdb = firebase.database().ref('blog');
  function savepost() {
      var image = document.getElementById('image').value;
      var content = document.getElementById('content').value;
      var title = document.getElementById('title').value;
      console.log(image, content, title);
  
      // Assuming you want to save data to Firebase
      saveToFirebase(title, content, image);
  }
  
  function saveToFirebase(title, content, image) {
    console.log('Title:', title);
    console.log('Content:', content);

    // Check if title and content are not empty
    if (title.trim() !== '' && content.trim() !== '') {
        const post = {
            title,
            content,
            image,
        };

        // Push the new post data to the "blog" node in Firebase
        blogdb.push(post);

        // Clear the form fields
        document.getElementById('title').value = '';
        document.getElementById('content').value = '';
        document.getElementById('image').value = '';
    } else {
        alert('Title and content cannot be empty.');
    }
}
function testSaveToFirebase() {
    const post = {
        title: "Test Title",
        content: "Test Content",
        image: "https://example.com/test-image.jpg"
    };

    // Push the test post data to the "blog" node in Firebase
    blogdb.push(post);
}
testSaveToFirebase();