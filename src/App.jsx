import { lazy, Suspense } from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import { Provider } from 'react-redux';

import store from './model/store.js';

import LoadingComponent from './loading/LoadingComponent';

const Locations = lazy(() => import('./views/Locations'));
const Location = lazy(() => import('./views/Location'));

function App() {
  return (
    <>
      <Provider store={store}>
        <Router>
          <Suspense fallback={<LoadingComponent />}>
            <Routes>
              <Route path="/" element={<Locations />} />
              <Route path="/about" element={<Locations />} />
              <Route path="/locations" element={<Locations />} />
              <Route path="/locations/:location" element={<Location />} />
            </Routes>
          </Suspense>
        </Router>
      </Provider>
    </>
  );
}

export default App;
