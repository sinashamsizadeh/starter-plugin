import MenuList from '@mui/material/MenuList';
import MenuItem from '@mui/material/MenuItem';
import ListItemText from '@mui/material/ListItemText';
import ListItemIcon from '@mui/material/ListItemIcon';
import Divider from '@mui/material/Divider';
import { Link } from 'react-router-dom';
import { __ } from '@wordpress/i18n';
import CalendarMonthIcon from '@mui/icons-material/CalendarMonth';
import DashboardIcon from '@mui/icons-material/Dashboard';
import BarChartIcon from '@mui/icons-material/BarChart';
import SettingsIcon from '@mui/icons-material/Settings';

const NavMenu = () => {
	return (
		<MenuList>
			<Link to="?page=timetable-dashboard" relative="path">
				<MenuItem>
					<ListItemIcon>
						<DashboardIcon fontSize="small" />
					</ListItemIcon>
					<ListItemText>
						{ __( 'Dashboard', 'timetable' ) }
					</ListItemText>
				</MenuItem>
			</Link>

			<Divider />
			<Link to="?page=timetable" relative="path">
				<MenuItem>
					<ListItemIcon>
						<CalendarMonthIcon fontSize="small" />
					</ListItemIcon>
					<ListItemText>
						{ __( 'Timetables', 'timetable' ) }
					</ListItemText>
				</MenuItem>
			</Link>

			<Divider />
			<Link to="?page=timetable-analytics" relative="path">
				<MenuItem>
					<ListItemIcon>
						<BarChartIcon fontSize="small" />
					</ListItemIcon>
					<ListItemText>
						{ __( 'Analytics', 'timetable' ) }
					</ListItemText>
				</MenuItem>
			</Link>

			<Divider />
			<Link to="?page=timetable-settings" relative="path">
				<MenuItem>
					<ListItemIcon>
						<SettingsIcon fontSize="small" />
					</ListItemIcon>
					<ListItemText>
						{ __( 'Settings', 'timetable' ) }
					</ListItemText>
				</MenuItem>
			</Link>
		</MenuList>
	);
};

export default NavMenu;
