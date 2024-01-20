const setupBooking = () => {
	const form = document.querySelector('form');
	form.addEventListener('submit', onSubmit);
};

const onSubmit = (event) => {
	event.preventDefault();
	const form = event.target;

	if (!selectedDate) {
		alert('Please, select event date.');
		return;
	}

	const inputs = form.querySelectorAll("input:not([type='submit'])");
	let data = {};

	inputs.forEach((input) => {
		const name = input.getAttribute('name');
		const value = input.value;

		if (!name) return;
		data[name] = value;
	});
	data['Date'] = new Date(selectedDate).toISOString();

	submit(data);
};

const submit = (data) => {
	console.log({ data });

	const queryString = new URLSearchParams(data).toString();
	console.log(queryString);

	const url = 'booking.php?' + queryString;
	console.log({ url });

	fetch(url, { mode: 'no-cors' })
		.then((r) => r.json())
		.then((response) => {
			console.log({ response });

			if (response.status !== 200) {
				console.error('Ups..');
				return;
			}

			alert('Thank you on your submission!');

			selectedDate = null;
			document
				.querySelector('.booking-calendar__item--selected')
				.classList.remove('booking-calendar__item--selected');
			const inputs = document.querySelectorAll(
				"form input:not([type='submit'])"
			);
			inputs.forEach((input) => {
				input.value = '';
			});
		})
		.catch(() => {
			alert('There was an error, please try again.');
		});
};

window.addEventListener('load', setupBooking);
