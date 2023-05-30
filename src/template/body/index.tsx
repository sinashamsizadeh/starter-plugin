import { Fragment } from 'react';
import { Route, Routes, useSearchParams } from 'react-router-dom';
import Dashboard from './component/dashboard/index';
import Timetable from './component/timetable/index';
import Analytics from './component/analytics/index';
import Settings from './component/settings/index';

const Body = () => {
	const timetableRoute = () => {
		const [ searchParams ] = useSearchParams();

		switch ( searchParams.get( 'page' ) ) {
			case 'timetable-dashboard':
				return <Dashboard />;
			case 'timetable':
				return <Timetable />;
			case 'timetable-analytics':
				return <Analytics />;
			case 'timetable-settings':
				return <Settings />;
		}
	};

	return (
		<Routes>
			<Route path={ location.pathname } element={ timetableRoute() } />
		</Routes>
	);
};

export default Body;
