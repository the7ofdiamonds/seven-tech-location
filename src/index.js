import ReactDOM from 'react-dom';
import App from './App';

const sevenTechLocation = document.getElementById('seven_tech_location');

if (sevenTechLocation) {
  ReactDOM.createRoot(sevenTechLocation).render(<App />);
}
