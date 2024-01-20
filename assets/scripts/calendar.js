let visibleDate = new Date();
let selectedDate = null;

const moveMonth = (value) => {
	visibleDate = new Date(
		visibleDate.getFullYear(),
		visibleDate.getMonth() + value,
		1
	);
	renderCalendar();
};

const renderCalendar = () => {
	const calendarElement = document.querySelector('.booking__calendar');

	const header = calendarElement.querySelector('.booking-calendar__month');
	const days = document.querySelectorAll(
		'.booking-calendar__row:not(:first-child) li'
	);

	const startOfTheMonth = parseDate(
		new Date(visibleDate.getFullYear(), visibleDate.getMonth())
	);
	selectedDate = null;

	if (document.querySelector('.booking-calendar__item--selected')) {
		document
			.querySelector('.booking-calendar__item--selected')
			.classList.remove('booking-calendar__item--selected');
	}

	const month = new Array(7 * 5).fill({}).map((_, i) => {
		const datetime = new Date(
			startOfTheMonth.year,
			startOfTheMonth.month,
			1 - startOfTheMonth.day + i
		);

		days[i].classList.remove('booking-calendar__item--outside');
		days[i].classList.remove('booking-calendar__item--disabled');

		days[i].innerText = datetime.getDate();

		if (datetime.getMonth() !== visibleDate.getMonth()) {
			days[i].classList.add('booking-calendar__item--outside');
		}

		if (datetime <= new Date()) {
			days[i].classList.add('booking-calendar__item--disabled');
		}

		days[i].onclick = function (item) {
			if (document.querySelector('.booking-calendar__item--selected')) {
				document
					.querySelector('.booking-calendar__item--selected')
					.classList.remove('booking-calendar__item--selected');
				selectedDate = null;
			}

			if (item.target.classList.length === 1) {
				item.target.classList.add('booking-calendar__item--selected');
				selectedDate = new Date(
					visibleDate.getFullYear(),
					visibleDate.getMonth(),
					parseInt(item.target.innerText) - 1
				);
			}
		};
		return datetime;
	});

	const monthText = visibleDate.toLocaleString('en-us', { month: 'long' });
	header.innerText = monthText + ' ' + visibleDate.getFullYear();
};

const setupCalendar = () => {
	renderCalendar();
};

const parseDate = (date) => {
	var dt = new Date(date);
	const day = dt.getDay();

	return {
		year: dt.getFullYear(),
		month: dt.getMonth(),
		date: dt.getDate(),
		day: day === 0 ? 6 : day - 1,
	};
};

window.addEventListener('load', setupCalendar);
