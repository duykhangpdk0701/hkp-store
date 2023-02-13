import React, { ChangeEvent, FC, useEffect, useMemo, useState } from "react";
import { SizeType } from "antd/lib/config-provider/SizeContext";
import { Input } from "antd";
import lodash from "lodash";
import { SearchNormal1 } from "iconsax-react";

interface IProps {
  onChange?: (value: string) => void;
  onClick?: (value: any) => void;
  className?: string;
  placeholder?: string;
  onSearch?: (value: string) => void;
  size?: SizeType;
}

const SearchInput: FC<IProps> = (props) => {
  const { className, placeholder } = props;
  const [valueInput, setValueInput] = useState<string | undefined>();

  const onSearch = useMemo(() => {
    return lodash.debounce((text: string) => {
      if (props.onSearch) {
        props.onSearch(text);
      }
    }, 800);
  }, [props]);

  useEffect(() => {
    if (valueInput === null || valueInput === undefined) {
      return;
    }
    onSearch(valueInput);
    return () => {
      onSearch.cancel();
    };
    // eslint-disable-next-line
  }, [valueInput]);

  const onClickKeyDown = (event: any) => {
    if (event.keyCode === 13 && props.onClick) {
      props.onClick(valueInput);
    }
  };

  const onChange = (e: ChangeEvent<HTMLInputElement>) => {
    const text = e.target.value;
    setValueInput(text);
    if (props.onChange) {
      props.onChange(text);
    }
  };

  return (
    <Input
      value={valueInput}
      type="text"
      onChange={onChange}
      onKeyDown={onClickKeyDown}
      suffix={<SearchNormal1 size={17} />}
      className={className}
      placeholder={placeholder}
      size={props.size}
    />
  );
};

export default SearchInput;
