import Product from "./Product";

const Home = () => {

  return (
    <div>
      <div>
        {/* banner */}
        <div style={{"marginBottom": "-1000px", "zIndex": -1}}>
          <img className="w-full"
            src="https://picsum.photos/id/10/200"
            alt="banner"
          />
        </div>
      </div>

      {/* main content */}
      <div>
        {/* products */}
        <Product />
      </div>
    </div>
  );
};

export default Home;
