import StarIcon from "@material-ui/icons/Star";

const Product = () => {
  return (
    <div className="flex flex-col">
      <div>
        <p>lorem ipsum</p>
        <p className="text-xs">
          $ <span className="text-base font-bold">99.99</span>
        </p>
        <div className="text-yellow-300">
          <StarIcon />
          <StarIcon />
          <StarIcon />
        </div>
      </div>
      <img className="max-h-72 w-24" src="https://picsum.photos/200" alt="item" />
    </div>
  );
};

export default Product;
