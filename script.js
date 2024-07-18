document.getElementById('addBookForm').addEventListener('submit', async function(event) {
    event.preventDefault();
    var title = document.getElementById('title').value;
    var author = document.getElementById('author').value;
    var genre = document.getElementById('genre').value;
    var status = document.getElementById('status').value;

    try {
        const response = await fetch('add_book.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `title=${title}&author=${author}&genre=${genre}&status=${status}`,
        });

        if (response.ok) {
            const data = await response.text();
            console.log(data);
            alert('Book added successfully!');
            document.getElementById('addBookForm').reset();
        } else {
            console.error('Error adding book');
            alert('Error adding book. Please try again later.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error adding book. Please try again later.');
    }
});