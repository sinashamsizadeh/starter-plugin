import App from './App';
import { store } from './app/store';
import { Provider } from 'react-redux';
import ReactDOM from 'react-dom';

ReactDOM.render(
	<Provider store={ store }>
		<App />
	</Provider>,
	document.getElementById( 'timetable' )
);
