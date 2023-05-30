import { Fragment } from 'react';
import { Route, Routes, useSearchParams } from 'react-router-dom';
import Dashboard from './component/dashboard/index';
import Starter from './component/starter/index';
import Analytics from './component/analytics/index';
import Settings from './component/settings/index';

const Body = () => {
	const starterRoute = () => {
		const [ searchParams ] = useSearchParams();

		switch ( searchParams.get( 'page' ) ) {
			case 'starter-dashboard':
				return <Dashboard />;
			case 'starter':
				return <Starter />;
			case 'starter-analytics':
				return <Analytics />;
			case 'starter-settings':
				return <Settings />;
		}
	};

	return (
		<Routes>
			<Route path={ location.pathname } element={ starterRoute() } />
		</Routes>
	);
};

export default Body;
