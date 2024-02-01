
$('#buttonA').click(function(event) {
    event.preventDefault();
    console.log('You had voted for YES!');
});

$('#buttonB').click(function(event) {
    event.preventDefault();
    console.log('You had voted for NO!');
});